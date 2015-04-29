@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        @if( Session::get( 'flash_notification.level' ) == "success" )
            <?php Toastr::success( Session::get( 'flash_notification.message' ), $title = 'Interacpedia Authentication', $options = [ ] ) ?>
        @elseif(Session::get( 'flash_notification.level' ) == "danger")
            <?php Toastr::error( Session::get( 'flash_notification.message' ), $title = 'Interacpedia Authentication', $options = [ ] ) ?>
        @else
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
    @endif
@endif
