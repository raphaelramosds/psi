<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaController extends CI_Controller 
{
	public $usr;

	public function __construct()
	{
		parent::__construct();
		$this->usr = $this->session->userdata('usuario');
		$this->load->model('ClinicasModel', 'clinicas');
		$this->load->model('AgendasModel','agendas');
		
		if ($this->usr == NULL) 
		{
			redirect('/');
		}
    }

    public function index($ano = NULL, $mes = NULL)
    {
		$p = array(
			'show_next_prev' 	=> TRUE,
			'start_day'    		=> 'saturday',
			'month_type'   		=> 'long',
			'day_type'     		=> 'short',
			'template'			=> '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
	
			{heading_row_start}<tr>{/heading_row_start}
	
			{heading_previous_cell}
			<th>
				<a href="{previous_url}" class="ls-btn">&lt;&lt; Anterior</a>
			</th>
			{/heading_previous_cell}

			{heading_title_cell}
			<th colspan="{colspan}" class="title">
				{heading}
			</th>
			{/heading_title_cell}

			{heading_next_cell}
			<th>
				<a href="{next_url}" class="ls-btn">Próximo &gt;&gt;</a>
			</th>
			{/heading_next_cell}
	
			{heading_row_end}</tr>{/heading_row_end}
	
			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
	
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td>{/cal_cell_start}
			{cal_cell_start_today}<td>{/cal_cell_start_today}
			{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
	
			{cal_cell_content}
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content}
			
			{cal_cell_content_today}
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content_today}
	
			{cal_cell_no_content}
				<div class="day_num">{day}</div>
			{/cal_cell_no_content}
	
			{cal_cell_no_content_today}
				<div class="day_num highlight">{day}</div>
			{/cal_cell_no_content_today}
	
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
	
			{cal_cell_other}{day}{/cal_cel_other}
	
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_cell_end_today}</td>{/cal_cell_end_today}
			{cal_cell_end_other}</td>{/cal_cell_end_other}
			{cal_row_end}</tr>{/cal_row_end}
	
			{table_close}</table>{/table_close}'
		);

		$this->load->library('calendar', $p);
		
		$cal_data = array(
			15 => 'foo'
		);
		$data_agenda = $this->agendas->view($this->usr[0]['id']);
		$data = array(
			'agendas'		=> $data_agenda,
			'calendario' 	=> $this->calendar->generate($ano,$mes, $cal_data),
		);

		$this->load->view('Home/menu');
		$this->load->view('Agenda/index', $data);

	}


    public function create()
    {
    	$data_create = array(
    		'clinicas'	=> $this->clinicas->view($this->usr[0]['id']),
    		'psicologo' => $this->usr[0]['id']
    	);

    	$this->load->view('Home/menu');
    	$this->load->view('Agenda/create', $data_create);
    }


    public function add()
    {
        $this->agendas->add($this->input->post());
        redirect('view-agenda');
    }
    
}
