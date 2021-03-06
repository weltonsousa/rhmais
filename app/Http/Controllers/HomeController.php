<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Estagiario;
use App\Instituicao;
use App\TceContrato;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalEstagiario = Estagiario::count();
        $totalInstituicao = Instituicao::count();
        $totalEmpresa = Empresa::count();

        $dataMasc = DB::table('estagiario')->where('sexo', 'Masculino')->count();
        $dataFem = DB::table('estagiario')->where('sexo', 'Feminino')->count();

        $dataMe = DB::table('estagiario')->where('nivel', 'NÍVEL MÉDIO - NM')->count();
        $dataSup = DB::table('estagiario')->where('nivel', 'NÍVEL SUPERIOR- NS')->count();
        $dataMTec = DB::table('estagiario')->where('nivel', 'NÍVEL MÉDIO TÉCNICO - MT')->count();
        $dataSTec = DB::table('estagiario')->where('nivel', 'NÍVEL TÉCNICO')->count();
        $dataNFund = DB::table('estagiario')->where('nivel', 'FUNDAMENTAL - NF')->count();
        $dataNProf = DB::table('estagiario')->where('nivel', 'NÍVEL PROFISSIONAL')->count();

        $jan1 = TceContrato::whereMonth('created_at', '1')->where('status', '1')->count();
        $jan2 = TceContrato::whereMonth('created_at', '1')->where('status', '2')->count();
        $fev1 = TceContrato::whereMonth('created_at', '2')->where('status', '1')->count();
        $fev2 = TceContrato::whereMonth('created_at', '2')->where('status', '2')->count();
        $mar1 = TceContrato::whereMonth('created_at', '3')->where('status', '1')->count();
        $mar2 = TceContrato::whereMonth('created_at', '3')->where('status', '2')->count();
        $abr1 = TceContrato::whereMonth('created_at', '4')->where('status', '1')->count();
        $abr2 = TceContrato::whereMonth('created_at', '4')->where('status', '2')->count();
        $mai1 = TceContrato::whereMonth('created_at', '5')->where('status', '1')->count();
        $mai2 = TceContrato::whereMonth('created_at', '5')->where('status', '2')->count();
        $jun1 = TceContrato::whereMonth('created_at', '6')->where('status', '1')->count();
        $jun2 = TceContrato::whereMonth('created_at', '6')->where('status', '2')->count();
        $jul1 = TceContrato::whereMonth('created_at', '7')->where('status', '1')->count();
        $jul2 = TceContrato::whereMonth('created_at', '7')->where('status', '2')->count();
        $ago1 = TceContrato::whereMonth('created_at', '8')->where('status', '1')->count();
        $ago2 = TceContrato::whereMonth('created_at', '8')->where('status', '2')->count();
        $set1 = TceContrato::whereMonth('created_at', '9')->where('status', '1')->count();
        $set2 = TceContrato::whereMonth('created_at', '9')->where('status', '2')->count();
        $out1 = TceContrato::whereMonth('created_at', '10')->where('status', '1')->count();
        $out2 = TceContrato::whereMonth('created_at', '10')->where('status', '2')->count();
        $nov1 = TceContrato::whereMonth('created_at', '11')->where('status', '1')->count();
        $nov2 = TceContrato::whereMonth('created_at', '11')->where('status', '2')->count();
        $dez1 = TceContrato::whereMonth('created_at', '12')->where('status', '1')->count();
        $dez2 = TceContrato::whereMonth('created_at', '12')->where('status', '2')->count();

        $chartjs4 = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'])
            ->datasets([
                [
                    "label" => "TCE ATIVOS",
                    'backgroundColor' => "rgba(40,88,255, 0.70)",
                    'borderColor' => "rgb(40,88,255)",
                    "pointBorderColor" => "rgba(58, 86, 109, 1)",
                    "pointBackgroundColor" => "#fff",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(58, 86, 109, 0.50)",
                    'data' => [$jan1, $fev1, $mar1, $abr1, $mai1, $jun1, $jul1, $ago1, $set1, $out1, $nov1, $dez1],
                ],
                [
                    "label" => "TCE INATIVOS",
                    'backgroundColor' => "rgba(235,35,85, 0.70)",
                    'borderColor' => "rgba(162,13,17, 0.7)",
                    "pointBorderColor" => "rgba(58, 86, 109, 1)",
                    "pointBackgroundColor" => "#fff",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(58, 86, 109, 1)",
                    'data' => [$jan2, $fev2, $mar2, $abr2, $mai2, $jun2, $jul2, $ago2, $set2, $out2, $nov2, $dez2],
                ],
            ])
            ->options([]);

        $chartjs1 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Masculino', 'Feminino'])
            ->datasets([
                [
                    'backgroundColor' => ['#2858FF', '#EB2355'],
                    'hoverBackgroundColor' => ['#2858FF', '#EB2355'],
                    'data' => [$dataMasc, $dataFem],
                ],
            ])
            ->options([]);

        $chartjs2 = app()->chartjs
            ->name('pie')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['MED', 'SUP', 'M. TEC', 'S. TEC', 'N. FUN', 'N. PRO'])
            ->datasets([
                [
                    'backgroundColor' => ['#DB3895', '#9B539F', '#4A84B5', '#42B5AE', '#68BE44', '#47B7A8'],
                    'hoverBackgroundColor' => ['#DB3895', '#9B539F', '#4A84B5', '#42B5AE', '#68BE44', '#47B7A8'],
                    'data' => [$dataMe, $dataSup, $dataMTec, $dataSTec, $dataNFund, $dataNProf],
                ],
            ])
            ->options([]);

        return view('home.index', compact('totalEstagiario', 'totalInstituicao', 'totalEmpresa', 'chartjs4', 'chartjs1', 'chartjs2'));
    }
}
