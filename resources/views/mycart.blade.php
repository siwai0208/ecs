@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:500px">
           <h1 style="color:#555555; text-align:center; font-size:3.6em; padding:24px 0px; font-weight:bold;"> {{ Auth::user()->name }}さんの<br>カート</h1>
           
            <div class="card-body">
               <p class="text-center">{{ $message ?? ''}}</p><br>
               
                @if($mycarts->isNotEmpty()) 

                    @foreach($mycarts as $mycart)
                        <div class="mycart_box">
                            {{$mycart->item->name}} <br>              
                            {{ number_format($mycart->item->price)}}バーツ </p>               
                            <img src="{{ Storage::disk('s3')->url('image')}}/{{$mycart->item->imgpath}}" alt="" class="incart" >
                            <br>
                            <form action="/delcart" method="post">
                                @csrf
                                <input type="hidden" name="delete" value="delete">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="item_id" value="{{ $mycart->item->id }}">
                                <input type="submit" value="カートから削除する">
                            </form>
                        </div>
                    @endforeach
                    <div class="text-center p-2">
                       個数：{{$count}}個<br>
                       <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}バーツ</p>  
                    </div>  
                    <form action="/checkout" method="POST">
                       @csrf
                       <a href='/'><button type="button" class="btn btn-light btn-lg text-center add-btn" >商品を追加する</button></a>
                       <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
                    </form>

                @else
                <p class="text-center">カートはからっぽです。<br><a href="{{ url('/') }}">TOPページ</a>から商品を選択してください</p>
                @endif

            </div>
       </div>
   </div>
</div>
@endsection
