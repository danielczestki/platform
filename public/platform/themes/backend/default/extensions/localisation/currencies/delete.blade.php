@layout('templates.default')

@section('title')
    {{ Lang::line('localisation::currencies/general.title')->get() }}
@endsection

@section('content')
<section id="currencies">
    <header class="head row-fluid">
        <div class="span6">
            <h1>{{ Lang::line('localisation::currencies/general.title')->get() }}</h1>
            <p>{{ Lang::line('localisation::currencies/general.description.delete', array('currency' => $currency['name']))->get() }}</p>
        </div>
        <nav class="tertiary-navigation span6">
            @widget('platform.menus::menus.nav', 2, 1, 'nav nav-pills pull-right', ADMIN)
        </nav>
    </header>

    <hr />

    <form action="{{ URL::to_admin('localisation/currencies/delete/' . $currency['slug']) }}" id="edit-form" class="form-horizontal" method="POST" accept-char="UTF-8">
        <input type="hidden" name="{{ Session::csrf_token }}" value="{{ Session::token() }}">

        <div class="alert alert-error">
            <h3>{{ Lang::line('general.warning')->get() }}</h3>
            
            @if ( $currency['default'] )
            <p>{{ Lang::line('localisation::currencies/message.delete.single.being_used', array('currency' => $currency['name']))->get() }}</p>
            @else
            <p>{{ Lang::line('localisation::currencies/message.delete.single.confirm', array('currency' => $currency['name']))->get() }}</p>
            
            <button class="btn btn-danger"><i class="icon-ok icon-white"></i> Delete</button> 
            <a href="{{ URL::to_admin('localisation/currencies') }}" class="btn btn-success"><i class="icon-remove icon-white"></i> {{ Lang::line('button.cancel')->get() }}</a>
            @endif
        </div>
    </form>
</section>
@endsection