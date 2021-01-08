@extends('admin.faqs.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Faq</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('faqs.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>question:</strong>
                {{ $faq->question }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reponse:</strong>
                {{ $faq->reponse }}
            </div>
        </div>
    </div>
@endsection