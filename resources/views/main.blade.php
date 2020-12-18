@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="width:auto;">
         <div class="top" style="height:60vh; display:flex; background-size:cover; justify-content:center; align-items:center; background-image: url({{ Storage::disk('s3')->url('image')}}/top.jpg);">
           <h1 style="color:#fefefe; text-align:center; font-size:6em; ; font-weight:600; "> (Sample App)<br>Easy Food Delivery!!  </h1>
         </div>
           <div class="">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($items as $item)

                        <div class="col-xs-6 col-sm-4 col-md-4 ">
                            <div class="mycart_box">
                                        {{$item->name}} <br>
                                        {{$item->price}}バーツ<br>
                                        <image src="{{ Storage::disk('s3')->url('image')}}/{{$item->imgpath}}" alt="" class="incart" ><br>
                                        {{$item->detail}} <br>
                                        <br>
                                    
                                        <form action="mycart" method="post">
                                        @csrf
                                        <br>
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <input type="submit" value="カートに追加する">
                                      </form>
                            </div>
                        </div>        
                    @endforeach
                </div>
                <div class="text-center" style="padding-top:30px; display:flex; justify-content:center; align-items:center; ">
                    {{$items->links('vendor.pagination.bootstrap-4')}} 
                </div>
           </div>
       </div>
   </div>
</div>
@endsection