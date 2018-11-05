@include('layout._head')
<div id="wrapper">
	@include('layout._header')
	@include('layout._errors')
	@yield('content')
</div>

@include('layout._foot')
