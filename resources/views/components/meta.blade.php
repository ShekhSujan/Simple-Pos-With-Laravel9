<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
<meta name="author" content="ParkerThemes">

<link rel="shortcut icon" href="{{ asset("assets/images/logo/{$allSetting->id}-favicon.{$allSetting->favicon}") }}"  />

<meta content="{{route('home')}}" name="url">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{ (isset($title)?$title:"Home") }}</title>
