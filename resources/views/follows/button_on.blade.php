{!! Form::open(array('route' => array('follows.destroy', $follow->id),'id'=>'delete-follow'.$formid_suffix, 'method' => 'delete'))!!}
<a class="btn btn-fixed-purple active submit"><i class="fa fa-share"></i> @lang('general/labels.you_follow')</a>
{!! Form::close() !!}

