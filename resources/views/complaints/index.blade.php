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

<p><strong>A : COMPLAINANT</strong></p> <br>

<p>1. Complainant's particulars</p>

<div class="form-group">
    <label for="first-name">First Name</label>
   <p> <input type="text"  id="first-name"></p>
  </div>

  <div class="form-group">
    <label for="middle-name">Middle Name</label>
  <p>    <input type="text"  id="middle-name"></p>
  </div>

  <div class="form-group">
    <label for="surname">Surname</label>
<p>    <input type="text"  id="surname"></p>
  </div>

  <div class="form-group">
    <label for="occupation">Occupation</label>
<p>    <input type="text"  id="occupation"></p>
  </div>

  <div class="form-group">
    <label for="title">Title</label>
 <p>   <input type="text"  id="title"></p>
  </div>

    <div class="form-group">
    <label for="representative">Institution/Representative</label>
<p>    <input type="text"  id="representative"></p>
  </div>

      <div class="form-group">
    <label for="address">Address</label>
<p>    <input type="text"  id="address"></p>
  </div>


  <div class="form-group">
    <label for="telephone">Telephone</label>
<p>    <input type="text"  id="telephone"></p>
  </div>

    <div class="form-group">
    <label for="email">Email</label>
<p>    <input type="text"  id="email"></p>
  </div>


    <div class="form-group">
    <label for="fax">Fax</label>
<p>    <input type="text"  id="fax"></p>
  </div>

<p>2. Client  Status</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="internal-external" id="internal" value="internal"> Internal Client
</label>
  <label class="radio-inline">
  <input type="radio" name="internal-external" id="external" value="external"> External Client
</label>
</div>




<p>3. Who is complaining</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="yourself" value="yourself"> Yourself
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="your-relative" value="your-relative"> Your Relative
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="representative" value="representative"> Complainant's representative
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="employer" value="representative"> Complainant's Employer
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="supervisor" value="supervisor"> Complainant's Job Supervisor
</label>
</div>


<p>4. Level of dissatification</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-low" value="low"> Low
</label>
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-average" value="average"> Average
</label>
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-high" value="high"> High
</label>
 
</div>



<br><br>

<p><strong>B : COMPLAINT DETAILS</strong></p> <br>

<div class="form-group">
    <label for="service-complained">Service Complained about</label>
   <p> <input type="text"  id="service-complained"></p>
  </div>


<div class="form-group">
    <label for="service-complained">Brief Explanation</label>
   <p>
   <textarea name="more-explanation"cols="30" rows="10"  width="100%"></textarea>
  </div>

  <div class="form-group">
    <label for="service-complained">Specific aspect of the complained service</label>
   <p>
   <textarea name="specific-aspect"cols="30" rows="10"  width="100%"></textarea>
  </div>

  <div class="form-group">
    <label for="location">Where the incident occured?</label>
   <p> <input type="text"  id="location"></p>
  </div>


    <div class="form-group">
    <label for="occ-date">Date of ocurrence</label>
   <p> <input type="text"  id="occ-date"></p>
  </div>

  <div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="prior-report" id="prior-before" value="reported-before"> Reported Before
</label>
  <label class="radio-inline">
  <input type="radio" name="prior-report" id="prior-after" value="not-reported"> Not Reported Before
</label>
</div>






 
  <button type="submit" class="btn btn-default"  style="border-radius: 2px">Submit</button>


  
</form>






@else





<form action="#"  class="malalamiko">

<p><strong>A : A. MLALAMIKAJI</strong></p> <br>

<p>1. Maelezo muhimu</p>

<div class="form-group">
    <label for="first-name">Jina la kwanza</label>
   <p> <input type="text"  id="first-name"></p>
  </div>

  <div class="form-group">
    <label for="middle-name">Jina la kati</label>
  <p>    <input type="text"  id="middle-name"></p>
  </div>

  <div class="form-group">
    <label for="surname">JIna la ukoo</label>
<p>    <input type="text"  id="surname"></p>
  </div>

  <div class="form-group">
    <label for="occupation">Kazi</label>
<p>    <input type="text"  id="occupation"></p>
  </div>

  <div class="form-group">
    <label for="title">Cheo</label>
 <p>   <input type="text"  id="title"></p>
  </div>

    <div class="form-group">
    <label for="representative">Taasisi/Mwakilishi wako</label>
<p>    <input type="text"  id="representative"></p>
  </div>

      <div class="form-group">
    <label for="address">Anwani</label>
<p>    <input type="text"  id="address"></p>
  </div>


  <div class="form-group">
    <label for="telephone">Simu</label>
<p>    <input type="text"  id="telephone"></p>
  </div>

    <div class="form-group">
    <label for="email">Barua pepe</label>
<p>    <input type="text"  id="email"></p>
  </div>


    <div class="form-group">
    <label for="fax">Nukushi</label>
<p>    <input type="text"  id="fax"></p>
  </div>

<p>2. Hali ya mteja</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="internal-external" id="internal" value="internal"> Mteja wa ndani
</label>
  <label class="radio-inline">
  <input type="radio" name="internal-external" id="external" value="external"> Mteja wa nje
</label>
</div>




<p>3. Anaelalamika ni</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="yourself" value="yourself"> Mlalamikaji mwenyewe
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="your-relative" value="your-relative"> Ndugu wa mlalamikaji
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="representative" value="representative"> Wakala wa mlalamikaji
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="employer" value="representative"> Mwajiri wa mlalamikaji
</label>
  <label class="radio-inline">
  <input type="radio" name="who-complaining" id="supervisor" value="supervisor"> Kiongozi wa kazi wa mlalamikaji
</label>
</div>


<p>4. Kiwango cha kuudhika mlalamikaji</p>

<div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-low" value="low"> Chini
</label>
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-average" value="average"> Wastani
</label>
  <label class="radio-inline">
  <input type="radio" name="dis-level" id="dis-high" value="high"> Juu sana
</label>
 
</div>



<br><br>

<p><strong>B : MAELEZO YA LALAMIKO</strong></p> <br>

<div class="form-group">
    <label for="service-complained">Huduma iliyolalamikiwa</label>
   <p> <input type="text"  id="service-complained"></p>
  </div>


<div class="form-group">
    <label for="service-complained">Maelezo kwa ufupi</label>
   <p>
   <textarea name="more-explanation"cols="30" rows="10"  width="100%"></textarea>
  </div>

  <div class="form-group">
    <label for="service-complained">Kasoro inayolalamikiwa</label>
   <p>
   <textarea name="specific-aspect"cols="30" rows="10"  width="100%"></textarea>
  </div>

  <div class="form-group">
    <label for="location">Mahali tukio lilipotokea</label>
   <p> <input type="text"  id="location"></p>
  </div>


    <div class="form-group">
    <label for="occ-date">Tarehe ya tukio</label>
   <p> <input type="text"  id="occ-date"></p>
  </div>

  <div class="form-group">
  <label class="radio-inline">
  <input type="radio" name="prior-report" id="prior-before" value="reported-before"> Umewahi kuwasilisha lalamiko hili kabla
</label>
  <label class="radio-inline">
  <input type="radio" name="prior-report" id="prior-after" value="not-reported"> Hujawahi kuwasilisha lalamiko hili kabla
</label>
</div>






 
  <button type="submit" class="btn btn-default"  style="border-radius: 2px">Tuma</button>


  
</form>




@endif














@stop

