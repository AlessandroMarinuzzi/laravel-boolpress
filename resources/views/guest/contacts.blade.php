@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('contacts.send')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Maio Rossi" aria-describedby="fullNameHelpe" minlength="5" maxlenght="255" value="{{old('full_name')}}" required>
          <small id="fullNameHelpe" class="text-muted">Type here your full name</small>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="example@example.com" value="{{old('email')}}" required>
          <small id="emailHelpId" class="form-text text-muted">Type here you email addess</small>
        </div>


        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block"> 📧 Send</button>
    </form>
</div>
@endsection