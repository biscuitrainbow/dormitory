@extends('layout')
@section('content')

<h2>แก้ไขข้อมูลผู้เช่า</h2><br>
          <div class="">
            <table class="table table-striped table-sm">
              <thead>
                <form action="/contract/edit/{{$contract->id}}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}
                  <div class="form-group">
                  <label for="inputState">ชื่อ - สกุล</label>
                  <select id="inputState" class="form-control" name="customer" >
                        @foreach($customers as $customer)
                        <option @if($customer->id == $contract->customer->id) {{"selected"}} @endif value="{{$customer->id}}">{{$customer->first_name . ' ' . $customer->last_name}}</option>
                        @endforeach
                  </select>
                  <br>
              <label for="inputState">ห้อง</label>
                  <select id="inputState" class="form-control" name="room">
                        @foreach($rooms as $room)
                        <option @if($room->id == $contract->room->id) {{"selected"}} @endif value="{{$room->id}}">{{$room->building . ' ' . $room->number}}</option>
                        @endforeach
                  </select>
                  <br>
                  <label for="name">ค่ามัดจำ</label>
                  <input type="text" class="form-control" name="earnest" id="name" placeholder="Earnest money" required="" value="{{$contract->earnest_money}}">
                  <br>
                  <label for="name">ค่าประกัน</label>
                  <input type="text" class="form-control" name="insurer" id="name" placeholder="Insurer money" required="" value="{{$contract->insurer_money}}">                  
                  <br>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                  <label for="name">เริ่มสัญญา</label>
                  <input type="date" class="form-control" name="start" id="name" placeholder="Start date" required="" value="{{$contract->start->toDateString()}}">
                  </div>
                  <div class="form-group col-md-6">
                  <label for="name">หมดสัญญา</label>
                  <input type="date" class="form-control" name="end" id="name" placeholder="End date" required="" value="{{$contract->end->toDateString()}}">
                  </div>
                  </div>
                  <br>
                  <label for="name">ชื่อผู้เช่าร่วม</label>
                  <input type="text" class="form-control" name="witness" id="name" placeholder="Witness name" required="" value="{{$contract->witness_name}}">
                  <br>
                  สำเนาสัญญา : <a href="/storage/{{$contract->document}}">สำเนาปัจจุบัน</a> ->
                     <input id="file" class="form-controler" name="document" type="file">
                  <br><br>
                  <p>สถานะ</p>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="มีสัญญา"
  @if($contract->status == 'มีสัญญา') checked @endif >
  <label class="form-check-label" for="exampleRadios1">
    มีสัญญา
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="หมดสัญญา"
  @if($contract->status == 'หมดสัญญา') checked @endif >
  <label class="form-check-label" for="exampleRadios2">
    หมดสัญญา
  </label>
  </div>
                </div>  	
            </table>
				<div class="col-xs-12 text-center">
          
            <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
            <a href="/contract/index" class="btn btn-secondary">กลับ</a> 
          </form>
        </div>
      </div>
          </div>
@endsection