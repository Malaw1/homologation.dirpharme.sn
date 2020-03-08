@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="card">
        <div class="card-header"><h3>Veuillez deposer votre dossier complet ici</h3></div>
        <div class="card-body">
        <p><small>Note: Veuillez compresser vos documents sous format zip ou rar avant de les uploader svp..!</small></p>

            <form action="{{ route('dossier.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="Module 1" name="label">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Module 1</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            <br>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="Module 2" name="label">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Module 2</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            <br>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="Module 3" name="label">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Module 3</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            <br>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="Module 4" name="label">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Module 4</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            <br>

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="Module 5" name="label">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Module 5</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>

            <br >

            <form action="{{ route('dossier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden"  name="label" value="Complement de dossier">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="enreg_id">
                            <label class="custom-file-label" for="customFile">Complement de dossier (Si necessaire)</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
