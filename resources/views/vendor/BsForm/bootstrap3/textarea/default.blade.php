<div class="form-group{{ $errors->{$errorBag}->has($nameWithoutBrackets) ? ' has-error' : '' }}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'content-label']) }}
    @endif

    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control', 'style' => 'resize: vertical'], $attributes)) }}

    @if($inlineValidation)
        @if($errors->{$errorBag}->has($nameWithoutBrackets))
            <strong class="help-block">{{ $errors->{$errorBag}->first($nameWithoutBrackets) }}</strong>
        @else
            <strong class="help-block">{!! $note !!}</strong>
        @endif
    @else
        <strong class="help-block">{!! $note !!}</strong>
    @endif
</div>
