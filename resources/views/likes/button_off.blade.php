{!! Form::model( $like = new \App\Interacpedia\Like, ['url' => 'likes','id'=>'likes-form'] ) !!}
<input type="hidden" name="model_id" id="model_id" value="{{ $model->id }}"/>
<input type="hidden" name="model_type" id="model_type" value="{{ get_class($model) }}"/>
<a class="btn btn-fixed-blue submit"><i class="fa fa-thumbs-o-up"></i> @lang('general/labels.like')</a>
{!! Form::close() !!}

