@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h3>Veuillez deposer votre dossier complet ici</h3></div>
        <div class="card-body">

            <form action="{{ route('dossier.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file">
                            <input type="file" required class="custom-file-input form-control" id="customFile" name="modules">
                            <input type="hidden" value="1" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
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
                            <input type="hidden" value="2" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
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
                            <input type="hidden" value="3" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
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
                            <input type="hidden" value="4" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
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
                            <input type="hidden" value="5" name="moduleNumber">
                            <input type="hidden" value="{{ $_GET['id'] }}" name="demande_id">
                            <label class="custom-file-label" for="customFile">Module 5</label>
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
