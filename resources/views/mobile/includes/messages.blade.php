@php
dd($errors);
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        @foreach ($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@elseif (Session::has('flash_success'))
    <div class="alert bg-green alert-dismissible">
        @if(is_array(json_decode(Session::get('flash_success'),true)))
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
        @else
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! Session::get('flash_success') !!}
        @endif
    </div>
@elseif (Session::has('flash_warning'))
    <div class="alert alert-warning">
        @if(is_array(json_decode(Session::get('flash_warning'),true)))
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! implode('', Session::get('flash_warning')->all(':message<br/>')) !!}
        @else
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! Session::get('flash_warning') !!}
        @endif
    </div>
@elseif (Session::has('flash_info'))
    <div class="alert alert-info">
        @if(is_array(json_decode(Session::get('flash_info'),true)))
            {!! implode('', Session::get('flash_info')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_info') !!}
        @endif
    </div>
@elseif (Session::has('flash_danger'))
    <div class="alert alert-danger">
        @if(is_array(json_decode(Session::get('flash_danger'),true)))
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! implode('', Session::get('flash_danger')->all(':message<br/>')) !!}
        @else
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {!! Session::get('flash_danger') !!}
        @endif
    </div>
@elseif (Session::has('flash_message'))
    <div class="alert alert-info">
        @if(is_array(json_decode(Session::get('flash_message'),true)))
            {!! implode('', Session::get('flash_message')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_message') !!}
        @endif
    </div>
@endif