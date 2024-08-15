@extends('layouts.site')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section>
        <div class="row pt-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-1">
                        <p class="text-uppercase fw-bold">crud</p>
                    </div>
                    <div class="col-4">
                        <a href="#" class="text-decoration-none text-secondary"><i
                                class="fas fa-home me-2"></i><span>Home / </span> <span class="text-primary">Crud
                                Padrão</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mt-5">
            <h1 class="fs-5">Atendimentos</h1>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Diários</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Semanais</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mensais</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h2 class="fs-5">Novo atendimento</h2>
            <form action="{{ route('appointments.store') }}" id="system-form-appointment" method="POST">
                @csrf
                <input type="hidden" id="appointmentId" name="appointmentId">
                <div class="card h-auto">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>Nome *</strong>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>Whatsapp</strong>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>Contato *</strong>
                                    <input type="text" class="form-control" id="contact" name="contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>CPF *</strong>
                                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>CEP *</strong>
                                    <input type="text" class="form-control" id="cep" name="cep" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>Como ficou sabendo da empresa?</strong>
                                    <select class="form-control" name="conversion_origin" id="conversion_origin">
                                        <option value=""></option>
                                        <option value="google">Google</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>Tipo</strong>
                                    <select class="form-control" name="tipo" id="tipo">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                <div class="form-group">
                                    <strong>Descrição</strong>
                                    <textarea class="form-control" name="descricao" id="descricao">
                                        
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                <div class="form-group">
                                    <strong>Observações</strong>
                                    <textarea class="form-control" name="observacoes" id="observacoes">
                                        
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <div class="form-group">
                                    <button id="appointmentSubmit" class="btn btn-success w-100 btn-block"
                                        type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-5">
            <h3 class="fs-5">Visualização</h3>
            <div class="card h-auto">
                <div class="card-body p-3">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Editar</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Observações</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="edit-checkbox" data-id="{{ $appointment->id }}"
                                            data-nome="{{ $appointment->nome }}"
                                            data-descricao="{{ $appointment->descricao }}"
                                            data-observacoes="{{ $appointment->observacoes }}"
                                            data-tipo="{{ $appointment->tipo }}"
                                            data-contact="{{ $appointment->contact }}" data-cpf="{{ $appointment->cpf }}"
                                            data-conversion_origin="{{ $appointment->conversion_origin }}"
                                            data-cep="{{ $appointment->cep }}"
                                            data-whatsapp="{{$appointment->whatsapp}}"/>
                                    </td>
                                    <td>{{ $appointment->nome }}</td>
                                    <td>{{ $appointment->descricao }}</td>
                                    <td>{{ $appointment->observacoes }}</td>
                                    <td>{{ $appointment->tipo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
