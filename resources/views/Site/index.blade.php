@extends('layouts.site')

@section('content')
    <section class="container" id="planos">
        <h1 class="my-4 text-center">Conheça Nossos Planos</h1>
        <div class="row">
            <div class=" mb-4 col-lg-3 col-md-6 col-sm-12" id="plano-1">
                <div class="card card-hover border-primary text-center">
                    <div class="card-body">
                        <h3 class="text-center text-primary">Basico</h3>
                        <p class="lead">uso pessoal de rede de simples com qualidade para o seu consumo</p>
                        <hr>
                        <p style="font-size: 2em; text-shadow: 0px 1px 1px grey" class="font-weight-bold badge badge-primary shadow-sm border-primary">30MB </p>

                        <p class="lead">R$100,00 - <strong>Sem Fidelidade</strong></p>
                        <p class="lead">R$90,90 - <strong>Com Fidelidade</strong></p>
                        
                    </div>
                </div>
            </div>
            <div class=" mb-4 col-lg-3 col-md-6 col-sm-12" id="plano-2">
                <div class="card card-hover border-primary text-center">
                    <div class="card-body">
                        <h3 class="text-center text-primary">Super</h3>
                        <p class="lead">um slogan rapido que busca chamar a atenção do cliente</p>
                        <hr>
                        
                        <p style="font-size: 2em; text-shadow: 0px 1px 1px grey" class="font-weight-bold badge badge-primary shadow-sm border-primary">50MB </p>

                        <p class="lead">R$110,00 - <strong>Sem Fidelidade</strong></p>
                        <p class="lead">R$99,00 - <strong>Com Fidelidade</strong></p>

                    </div>
                </div>
            </div>
            <div class=" mb-4 col-lg-3 col-md-6 col-sm-12" id="plano-3">
                <div class="card card-hover border-primary text-center">
                    <div class="card-body">
                        <h3 class="text-center text-primary">Mega</h3>
                        <p class="lead">um slogan rapido que busca chamar a atenção do cliente</p>
                        <hr>
                        <p style="font-size: 2em; text-shadow: 0px 1px 1px grey" class="font-weight-bold badge badge-primary shadow-sm border-primary">100MB </p>

                        <p class="lead">R$150,00 - <strong>Sem Fidelidade</strong></p>
                        <p class="lead">R$125,00 - <strong>Com Fidelidade</strong></p>

                    </div>
                </div>
            </div>
            <div class=" mb-4 col-lg-3 col-md-6 col-sm-12" id="plano-4">
                <div class="card card-hover border-primary text-center">
                    <div class="card-body">
                        <h3 class="text-center text-primary">Hyper</h3>
                        <p class="lead">um slogan rapido que busca chamar a atenção do cliente</p>
                        <hr>
                        <p style="font-size: 2em; text-shadow: 0px 0px 1px grey" class="font-weight-bold badge badge-warning border-primary">200MB </p>

                        <p class="lead">R$200,00 - <strong>Sem Fidelidade</strong></p>
                        <p class="lead">R$160,00 - <strong>Com Fidelidade</strong></p>

                    </div>
                </div>
            </div>
        </div>
</section>


@endsection

@section('scripts')
    <script>
        ScrollReveal().reveal('#plano-1', { delay: 500 , reset: true});
        ScrollReveal().reveal('#plano-2', { delay: 1000 , reset: true});
        ScrollReveal().reveal('#plano-3', { delay: 1500 , reset: true});
        ScrollReveal().reveal('#plano-4', { delay: 2000 , reset: true});
    </script>
@endsection