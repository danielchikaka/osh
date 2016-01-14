 @extends('layouts.site.right-sidebar')
  
        
@section('title')
<section id="title-wrapper">
    <div class="container" id="title-wrap-inner">
        <h1>    
               {{ (Session::get('locale')=='en')?'Report Complaints':'Toa Malalamiko'}}
           </h1>
    </div><!--/container title-wrap-inner-->
</section>
@stop

@section('content')


<p>
                {{ (Session::get('locale')=='en')?'Please fill the below form to report your complaint':'Tafadhali jana fomu hapo chini kutoa taarifa ya malalamiko yako'}}
</p>

<style>
    .malalamiko p{
       margin: 0px  0 5px 0 !important;
        }
    .malalamiko input{
          border-radius: 0px;
    }
    .malalamiko p input, textarea{
        width: 70%;
    }
    .malalamiko p input:focus, textarea:focus{
       outline: 0;
    }
</style>


@if(Session::get('locale')=='en')



<form action="#"  class="malalamiko">
      {!!  Form::open(array('route' => 'contact.send-mail', 'class' => 'malalamiko')) !!}


<p><strong>A : COMPLAINANT</strong></p> <br>

<p>1. Complainant's particulars</p>

<div class="form-group">
    <label for="first-name">First Name</label>
   <p>      {!! Form::text('first-name',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="middle-name">Middle Name</label>
     <p>      {!! Form::text('middle-name',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="surname">Surname</label>
   <p>      {!! Form::text('surname',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="occupation">Occupation</label>
   <p>      {!! Form::text('occupation',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="title">Title</label>
       <p>      {!! Form::text('title',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

    <div class="form-group">
    <label for="representative">Institution/Representative</label>
   <p>      {!! Form::text('representative',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

      <div class="form-group">
    <label for="address">Address</label>
   <p>      {!! Form::text('address',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


  <div class="form-group">
    <label for="telephone">Telephone</label>
   <p>      {!! Form::text('telephone',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

    <div class="form-group">
    <label for="email">Email</label>
   <p>      {!! Form::text('email',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


    <div class="form-group">
    <label for="fax">Fax</label>
   <p>      {!! Form::text('fax',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

<p>2. Client  Status</p>

<div class="form-group">
  <label class="radio-inline">
  {!! Form::radio('internal-external', 'internal') !!} Internal Client
</label>
  <label class="radio-inline">
    {!! Form::radio('internal-external', 'external') !!} External Client
</label>
</div>




<p>3. Who is complaining</p>

<div class="form-group">
  <label class="radio-inline">
      {!! Form::radio('who-complaining', 'yourself') !!} Yourself
</label>
  <label class="radio-inline">
        {!! Form::radio('who-complaining', 'your-relative') !!} Your Relative
</label>
  <label class="radio-inline">
          {!! Form::radio('who-complaining', 'representative') !!} Complainant's representative
</label>
  <label class="radio-inline">
           {!! Form::radio('who-complaining', 'employer') !!} Complainant's Employer
</label>
  <label class="radio-inline">
      {!! Form::radio('who-complaining', 'supervisor') !!} Complainant's Job Supervisor
</label>
</div>


<p>4. Level of dissatification</p>

<div class="form-group">
  <label class="radio-inline">
        {!! Form::radio('dis-level', 'dis-level') !!} Low

</label>
  <label class="radio-inline">
          {!! Form::radio('dis-level', 'average') !!} Average
</label>
  <label class="radio-inline">
            {!! Form::radio('dis-level', 'high') !!} High
</label>
 
</div>



<br><br>

<p><strong>B : COMPLAINT DETAILS</strong></p> <br>

<div class="form-group">
    <label for="service-complained">Service Complained about</label>
      <p>      {!! Form::text('service-complained',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


<div class="form-group">
    <label for="service-complained">Brief Explanation</label>
      <p>      {!! Form::textarea('more-explanation',null,['id'=>'','placeholder'=>'', 'width' => '100%', 'cols' => '30', 'rows'=>'10']) !!}</p>

  </div>

  <div class="form-group">
    <label for="service-complained">Specific aspect of the complained service</label>

         <p>      {!! Form::textarea('specific-aspect',null,['id'=>'','placeholder'=>'', 'width' => '100%', 'cols' => '30', 'rows'=>'10']) !!}</p>
  </div>

  <div class="form-group">
    <label for="location">Where the incident occured?</label>
         <p>      {!! Form::text('location',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


    <div class="form-group">
    <label for="occ-date">Date of ocurrence</label>
          <p>      {!! Form::text('occ-date',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
  <label class="radio-inline">
    {!! Form::radio('prior-report', 'reported-before') !!} Reported Before
</label>
  <label class="radio-inline">
    {!! Form::radio('prior-report', 'not-reported') !!} Not Reported Before
</label>
</div>






 
  <button type="submit" class="btn btn-default"  style="border-radius: 2px">Submit</button>


  
  {!! Form::close() !!}






@else





<form action="#"  class="malalamiko">

<p><strong>A : A. MLALAMIKAJI</strong></p> <br>

<p>1. Maelezo muhimu</p>

<div class="form-group">
    <label for="first-name">Jina la kwanza</label>
    <p>      {!! Form::text('first-name',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="middle-name">Jina la kati</label>
  <p>      {!! Form::text('middle-name',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="surname">JIna la ukoo</label>
  <p>      {!! Form::text('surname',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="occupation">Kazi</label>
   <p>      {!! Form::text('occupation',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
    <label for="title">Cheo</label>
  <p>      {!! Form::text('title',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

    <div class="form-group">
    <label for="representative">Taasisi/Mwakilishi wako</label>
   <p>      {!! Form::text('representative',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

      <div class="form-group">
    <label for="address">Anwani</label>
   <p>      {!! Form::text('address',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


  <div class="form-group">
    <label for="telephone">Simu</label>
   <p>      {!! Form::text('telephone',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

    <div class="form-group">
    <label for="email">Barua pepe</label>
   <p>      {!! Form::text('email',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


    <div class="form-group">
    <label for="fax">Nukushi</label>
   <p>      {!! Form::text('fax',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

<p>2. Hali ya mteja</p>

<div class="form-group">
  <label class="radio-inline">
  {!! Form::radio('internal-external', 'internal') !!} Mteja wa ndani
</label>
  <label class="radio-inline">
   {!! Form::radio('internal-external', 'external') !!} Mteja wa nje
</label>
</div>




<p>3. Anaelalamika ni</p>

<div class="form-group">
  <label class="radio-inline">
  {!! Form::radio('who-complaining', 'yourself') !!} Mlalamikaji mwenyewe
</label>
  <label class="radio-inline">
   {!! Form::radio('who-complaining', 'your-relative') !!} Ndugu wa mlalamikaji
</label>
  <label class="radio-inline">
      {!! Form::radio('who-complaining', 'representative') !!} Wakala wa mlalamikaji
</label>
  <label class="radio-inline">
    {!! Form::radio('who-complaining', 'employer') !!} Mwajiri wa mlalamikaji
</label>
  <label class="radio-inline">
    {!! Form::radio('who-complaining', 'supervisor') !!} Kiongozi wa kazi wa mlalamikaji
</label>
</div>


<p>4. Kiwango cha kuudhika mlalamikaji</p>

<div class="form-group">
  <label class="radio-inline">
  {!! Form::radio('dis-level', 'dis-level') !!} Chini
</label>
  <label class="radio-inline">
 {!! Form::radio('dis-level', 'average') !!} Wastani
</label>
  <label class="radio-inline">
   {!! Form::radio('dis-level', 'high') !!} Juu sana
</label>
 
</div>



<br><br>

<p><strong>B : MAELEZO YA LALAMIKO</strong></p> <br>

<div class="form-group">
    <label for="service-complained">Huduma iliyolalamikiwa</label>
   <p>      {!! Form::text('service-complained',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


<div class="form-group">
    <label for="service-complained">Maelezo kwa ufupi</label>
     <p>      {!! Form::textarea('more-explanation',null,['id'=>'','placeholder'=>'', 'width' => '100%', 'cols' => '30', 'rows'=>'10']) !!}</p>
  </div>

  <div class="form-group">
    <label for="service-complained">Kasoro inayolalamikiwa</label>
          <p>      {!! Form::textarea('specific-aspect',null,['id'=>'','placeholder'=>'', 'width' => '100%', 'cols' => '30', 'rows'=>'10']) !!}</p>
  </div>

  <div class="form-group">
    <label for="location">Mahali tukio lilipotokea</label>
   <p>      {!! Form::text('location',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>


    <div class="form-group">
    <label for="occ-date">Tarehe ya tukio</label>
  <p>      {!! Form::text('occ-date',null,['id'=>'','placeholder'=>'']) !!}</p>
  </div>

  <div class="form-group">
  <label class="radio-inline">
{!! Form::radio('prior-report', 'reported-before') !!} Umewahi kuwasilisha lalamiko hili kabla
</label>
  <label class="radio-inline">
  {!! Form::radio('prior-report', 'not-reported') !!} Hujawahi kuwasilisha lalamiko hili kabla
</label>
</div>






 
  <button type="submit" class="btn btn-default"  style="border-radius: 2px">Tuma</button>


  
  {!! Form::close() !!}




@endif














@stop

