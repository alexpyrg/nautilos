@extends('layouts.cms')
@section('content')
    @if(! Auth::check())
        {{ redirect('/') }}
    @endif
    <form class="back-end-form" action="/admin/pages/content/{{ $pageContent->page_id }}/save" method="POST">
            <div class="small-select" name="locale_selection" wire:model="locale_selection">

            </div>
        <div class="input_group block">
            <label for="page_content"> Περιεχόμενο Σελίδας ({{ $page->name }}) | $pageLocale->code : </label>
            <textarea name="content" id="editor">
                {{ $pageContent->content }}
            </textarea>
        </div>

        <input type="submit" value="Αποθήκευση">
    </form>
@endsection
