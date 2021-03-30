<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <title>Gesto ASO - {{ $aso->employee->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets/aso/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/aso/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/aso/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @for($i = 0; $i <= 2; $i++)
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-body invoice-head">
                                <div class="row">
                                    <div class="col-md-2 align-self-center">
                                        <img src="{{ asset('assets/aso/image/Logo.png') }}"
                                            class="logo-lg" height="145">
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="list-inline mb-0 contact-detail float-right">
                                            <li class="list-inline-item">
                                                <div class="pl-3">
                                                    <p class="text-muted mb-0 font-13"><strong>CMA - Saúde Ocupacional e
                                                            Segurança do Trabalho Ltda EPP.</strong></p>
                                                    <p class="text-muted mb-0 font-13">Av. Francisco Pereira de Castro,
                                                        358
                                                        - Anhangabaú, Jundiaí - <br> SP, 13208-110</p>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="pl-3">
                                                    <p class="text-muted mb-0 font-13">www.grupocma.com.br</p>
                                                    <p class="text-muted mb-0 font-13">comercial@grupocma.com.br</p>
                                                    <br>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="pl-3">
                                                    <p class="text-muted mb-0 font-13">(11) 4806 - 8400</p>
                                                    <p class="text-muted mb-0 font-13">(11) 4806 - 8401</p>
                                                    <br>
                                                </div>
                                            </li>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <h6><b>Data da emissão: </b>
                                                            {{ $aso->created_at->format('d/m/Y') }}
                                                        </h6>
                                                        <p class="">Em cumprimento ao Capítulo V da CLT Lei 6.514/77 -
                                                            artigo 168 § 1º e 3º e Portarias Nºs 3.214/78, 3.164/2,
                                                            24/94 e
                                                            8/96 NR-7
                                                            do Ministério do Trabalho <br> e Emprego foi emitido o:
                                                        </p>
                                                        <h4 class="mb-0"><b>Atestado de Saúde Ocupacional (ASO): </b>
                                                            {{ $aso->type }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-15">CNPJ:</strong><br>
                                                {{ $aso->company->cnpj }}
                                                <hr style="border-top: dotted 1px; width: 1162px;">
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="">
                                            <address class="font-13">
                                                <strong class="font-15">Empresa:</strong><br>
                                                {{ $aso->company->name }}
                                                <br>
                                                <br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-15">CPF:</strong><br>
                                                {{ $aso->employee->cpf }}
                                                <hr style="border-top: dotted 1px; width: 1162px;">
                                                <strong class="font-15">Ambiente de Trabalho:</strong><br>
                                                {{ $aso->workplace }}
                                                <hr style="border-top: dotted 1px; width: 1162px;">
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-15">Funcionário:</strong><br>
                                                {{ $aso->employee->name }}
                                                <br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-15">Data de Nascimento:</strong><br>
                                                {{ date("d/m/Y", strtotime($aso->employee->born_date)) }}
                                                <br>
                                                <br>
                                                <br>
                                                <strong class="font-15">Cargo:</strong><br>
                                                {{ $aso->post }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-15">Sexo:</strong><br>
                                                {{ $aso->employee->gender }}
                                                <br>
                                                <br>
                                                <br>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-left">
                                    <div class="col-lg-12">
                                        <h6 class="mt-1">Foi clinicamente examinado(a), estando exposto(a) aos seguintes
                                            fatores de riscos:</h6>
                                        <ul class="pl-3">
                                            <li><strong>Físico..........:
                                                </strong>{{ $aso->physicist ? : 'Ausência de Risco' }}
                                            </li>
                                            <li><strong>Químico......:
                                                </strong>{{ $aso->chemical ? : 'Ausência de Risco' }}
                                            </li>
                                            <li><strong>Ergonônico.:
                                                </strong>{{ $aso->ergonomic ? : 'Ausência de Risco' }}
                                            </li>
                                            <li><strong>Acidente.....:
                                                </strong>{{ $aso->accident ? : 'Ausência de Risco' }}
                                            </li>
                                            <li><strong>Biológico....:
                                                </strong>{{ $aso->biological ? : 'Ausência de Risco' }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <h6 class="mt-1">Sendo submetido(a) aos seguintes procedimentos
                                                diagnósticos:
                                            </h6>
                                            <table class="table table-sm mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Procedimentos Realizados</th>
                                                        <th style="width:3cm;">Data Realizada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($aso->exams as $item)
                                                        <tr>
                                                            <td>{{ $item->description }}</td>
                                                            <td>{{ date("d/m/Y", strtotime($item->pivot->execution_date)) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <hr style="width: 100%; margin-top: 0;">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <h6 class="mt-2">Conclusão
                                    <hr style="width: 100%; margin-top: 0.3cm;">
                                </h6>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-14">Apto
                                                    (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;</strong>
                                                @if($aso->conclusion)
                                                    {{ $aso->conclusion->description }}<br>
                                                @endif
                                            </address>
                                        </div>
                                        <hr style="border-top: dotted 1px; width: 100%; margin-top: 1cm;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-14">Inapto
                                                    (&nbsp;&nbsp;&nbsp;&nbsp;)</strong><br>
                                            </address>
                                        </div>
                                        <hr style="border-top: dotted 1px; width: 100%; margin-top: 1cm;">
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-14">Parecer Médico:</strong><br>
                                            </address>
                                        </div>
                                        <hr style="border-top: dotted 1px; width: 100%; margin-top: 1cm;">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <hr style="border-top: dotted 1px; width: 100%;">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-14">Médico(a) Examinador(a)</strong><br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <hr style="border-top: dotted 1px; width: 100%;">
                                        <div class="float-left">
                                            <address class="font-13">
                                                <strong class="font-14">Recebi a 2ª Via -
                                                    Funcionário(a)</strong><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-left">
                                            @if($aso->doctor)
                                                <address class="font-13">
                                                    <strong class="font-14">Médico(a) do Trabalho - Coord. do
                                                        PCMSO</strong><br>
                                                    Dr(a). {{ $aso->doctor->name }} <br>
                                                    CRM: {{ $aso->doctor->crm }}/{{ $aso->doctor->uf }} <br>
                                                </address>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="page-break-before: always;"></div>
    @endfor

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body invoice-head">
                            <div class="row">
                                <div class="col-md-2 align-self-center">
                                    <img src="{{ asset('assets/aso/image/Logo.png') }}"
                                        class="logo-lg" height="145">
                                </div>
                                <div class="col-md-10">
                                    <ul class="list-inline mb-0 contact-detail float-right">
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <p class="text-muted mb-0 font-13"><strong>CMA - Saúde Ocupacional e
                                                        Segurança do Trabalho ltda EPP.</strong></p>
                                                <p class="text-muted mb-0 font-13">Av. Francisco Pereira de Castro,
                                                    358
                                                    - Anhangabaú, Jundiaí - <br> SP, 13208-110</p>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <p class="text-muted mb-0 font-13">www.grupocma.com.br</p>
                                                <p class="text-muted mb-0 font-13">comercial@grupocma.com.br</p>
                                                <br>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="pl-3">
                                                <p class="text-muted mb-0 font-13">(11) 4806 - 8400</p>
                                                <p class="text-muted mb-0 font-13">(11) 4806 - 8401</p>
                                                <br>
                                            </div>
                                        </li>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <h6><b>Data da emissão: </b>
                                                        {{ $aso->created_at->format('d/m/Y') }}
                                                    </h6>
                                                    <h4 class="mb-0"><b>Ficha Clínica - </b>
                                                        {{ $aso->type }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <address class="font-13">
                                            <strong class="font-15">CNPJ:</strong><br>
                                            {{ $aso->company->cnpj }}
                                            <hr style="border-top: dotted 1px; width: 1162px;">
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="">
                                        <address class="font-13">
                                            <strong class="font-15">Empresa:</strong><br>
                                            {{ $aso->company->name }}
                                            <br>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <address class="font-13">
                                            <strong class="font-15">CPF:</strong><br>
                                            {{ $aso->employee->cpf }}

                                            <hr style="border-top: dotted 1px; width: 1162px;">

                                            <br>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <address class="font-13">
                                            <strong class="font-15">Funcionário:</strong><br>
                                            {{ $aso->employee->name }}
                                            <br>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <address class="font-13">
                                            <strong class="font-15">Data de Nascimento:</strong><br>
                                            {{ date("d/m/Y", strtotime($aso->employee->born_date)) }}
                                            <br>
                                            <br>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <address class="font-13">
                                            <strong class="font-15">Sexo:</strong><br>
                                            {{ $aso->employee->gender }}
                                            <br>
                                            <br>
                                            <br>
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <h6 style="margin-top: -0.5cm">Sinais vitais:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Peso:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>(Kg)
                                            </li>
                                            <br>
                                            <li><strong>Altura:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>(Mt)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Pressão:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>(mmHg)
                                            </li>
                                            <br>
                                            <li><strong>Freq. Cardíaca:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>(bpm)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h6 class="mt-0">Antecedentes pessoais/familiares:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Afastamento pelo INSS..:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Acidente de trabalho......:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Internação prévia...........:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Cirurgia..........................:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Doenças....................:
                                                </strong> &nbsp; Não (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Asma/Bronquite
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; HAS (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;
                                                Doença psiquiátrica (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Câncer
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Diabetes (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp; Quadro epilético (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Uso de medicamentos:
                                                </strong>
                                                <br>&nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp; Não
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;
                                                <strong>Quais?
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h6 class="mt-0">Saúde da mulher:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Métodos contraceptivos:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Data da última menstruação:
                                                </strong>.................................................:
                                                ______/_________/___________
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h6 class="mt-0">Histórico profissional e estilo de vida:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Tempo de trabalho:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                            <br>
                                            <li><strong>Última empresa:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                            <br>
                                            <li><strong>Função:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Atividade insalubre ou perigosa..........:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Não
                                                (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Dores decorrente do emprego anterior:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Não
                                                (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Tabagista..........:
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Não
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Ex tabagista
                                                (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp; | &nbsp; Quanto tempo? ________________
                                            </li>
                                            <li><strong>Etilista..............:
                                                </strong> &nbsp; Não (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Diariamente
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Eventualmente
                                                (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Atividade física.:
                                                </strong> &nbsp; Não (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Diariamente
                                                (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Eventualmente
                                                (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h6 class="mt-0">Exame físico:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Pele/Mucosa.......:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Cabeça/Pescoço.:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Pulmão...............:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Coração..............:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Tórax..................:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Abdomem...........:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>MMII...................:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Ósteo-Artic.........:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <li><strong>Sist. Nerv............:
                                                </strong> &nbsp; Normal (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Alterado (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h6 class="mt-0">Acuidade Visual:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>OD:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                            <br>
                                            <li><strong>OE:
                                                    <hr style="border-top: dotted 1px; width: 450px; margin: 0">
                                                    </strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <ul class="pl-3">
                                            <li><strong>Com lentes?
                                                    <br>
                                                </strong> &nbsp; Sim (&nbsp;&nbsp;&nbsp;&nbsp;)
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Não (&nbsp;&nbsp;&nbsp;&nbsp;)
                                            </li>
                                            <br>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-left">
                                        <address class="font-13">
                                            <strong class="font-14">Conclusão:</strong><br>
                                            Apto (&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp; Inapto (&nbsp;&nbsp;&nbsp;&nbsp;)
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <hr style="border-top: dotted 1px; width: 100%; margin: 0">
                                    <div class="float-left">
                                        <address class="font-13">
                                            <strong class="font-14">Médico(a) Examinador(a)</strong><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <hr style="border-top: dotted 1px; width: 100%; margin: 0">
                                    <div class="float-left">
                                        <address class="font-13">
                                            <strong class="font-14">Funcionário(a)</strong><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        javascript: window.print();

    </script>
</body>


</html>
