<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);
	}
	function bar()
	{
		$chartData=file_get_contents('assets/tugasvisin.json');
		$chartData=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $chartData), true);
$res=array();
		$keysArray=array();

//total RT
	$totalRT=[array('Jumah RT Dipantau','Kelurahan',array('role'=>'style'))];
	$totaldata=array();
	foreach($chartData as $row)
	{
		$ded=$row['KELURAHAN'];
		
		if(!isset($totaldata[$ded]))
		{
			$totaldata[$ded]=[$row['JML RT DIPANTAU']];
		}else{
			array_push($totaldata[$ded],$row['JML RT DIPANTAU']);
		}
	
}
	$ded=array_keys($totaldata);
	foreach(array_keys($totaldata) as $row)
	{
		$dat =[$row,array_sum($totaldata[$row]),'color: purple'];
		array_push($totalRT, $dat);
	}
	$data['BarChartTitle']= ' Jumlah RT Yang Dipantau ';
	$data['BarChartData']=json_encode($totalRT);

//total Indikator Perilaku
	$totalRT2=[array('Indikator Perilaku','Kelurahan',array('role'=>'style'))];
	$totaldata2=array();
	foreach($chartData as $row)
	{
		$ded2=$row['KELURAHAN'];
		
		if(!isset($totaldata2[$ded2]))
		{
			$totaldata2[$ded2]=[$row['Indikator Perilaku']];
 		}else{
			array_push($totaldata2[$ded2],$row['Indikator Perilaku']);
		}
	
}
	$ded2=array_keys($totaldata2);
	foreach(array_keys($totaldata2) as $row)
	{
		$dat =[$row,array_sum($totaldata2[$row]),'color: lime'];
		array_push($totalRT2, $dat);
	}
	$data['BarChartTitle2']= ' Jumlah RT Yang Dipantau Berdasarkan Indikator Perilaku ';
	$data['BarChartData2']=json_encode($totalRT2);

//total Indikator Gaya Hidup
	$totalRT3=[array('Indikator Gaya Hidup','Kelurahan',array('role'=>'style'))];
	$totaldata3=array();
	foreach($chartData as $row)
	{
		$ded3=$row['KELURAHAN'];
		
		if(!isset($totaldata3[$ded3]))
		{
			$totaldata3[$ded3]=[$row['Indikator Gaya Hidup']];
		}else{
			array_push($totaldata3[$ded3],$row['Indikator Gaya Hidup']);
		}
	
}
	$ded3=array_keys($totaldata3);
	foreach(array_keys($totaldata3) as $row)
	{
		$dat =[$row,array_sum($totaldata3[$row]),'color: red'];
		array_push($totalRT3, $dat);
	}
	$data['BarChartTitle3']= ' Jumlah RT Yang Dipantau Berdasarkan Indikator Gaya Hidup ';
	$data['BarChartData3']=json_encode($totalRT3);


//total RT Ber PHBS
	$totalRTA=[array('RT BER-PHBS','Kelurahan',array('role'=>'style'))];
	$totaldataA=array();
	foreach($chartData as $row)
	{
		$dedA=$row['KELURAHAN'];
		
		if(!isset($totaldataA[$dedA]))
		{
			$totaldataA[$dedA]=[$row['RT BER-PHBS']];
 		}else{
			array_push($totaldataA[$dedA],$row['RT BER-PHBS']);
		}
	
}
	$dedA=array_keys($totaldataA);
	foreach(array_keys($totaldataA) as $row)
	{
		$dat =[$row,array_sum($totaldataA[$row]),'color: orange'];
		array_push($totalRTA, $dat);
	}
	$data['BarChartTitleA']= ' Jumlah RT BER-PHBS ';
	$data['BarChartDataA']=json_encode($totalRTA);


//total RT Tidak Ber-PHBS
	$totalRT5=[array('RT Tidak Ber-PHBS','Kelurahan',array('role'=>'style'))];
	$totaldata5=array();
	foreach($chartData as $row)
	{
		$ded5=$row['KELURAHAN'];
		
		if(!isset($totaldata5[$ded5]))
		{
			$totaldata5[$ded5]=[$row['RT Tidak Ber-PHBS']];
		}else{
			array_push($totaldata5[$ded5],$row['RT Tidak Ber-PHBS']);
		}
	
}
	$ded5=array_keys($totaldata5);
	foreach(array_keys($totaldata5) as $row)
	{
		$dat =[$row,array_sum($totaldata5[$row]),'color: blue'];
		array_push($totalRT5, $dat);
	}
	$data['BarChartTitle5']= ' Jumlah RT Tidak Ber-PHBS ';
	$data['BarChartData5']=json_encode($totalRT5);

		$this->load->view('bar', $data);

	}
}
