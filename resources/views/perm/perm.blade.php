<div>
@foreach($perms as $perm)
    @if(!$perm['pid'])
        </div><div>
    @endif
    <label class="checkbox-inline">
        <input type="checkbox" id="inlineCheckbox{{ $perm['id'] }}" value="{{ $perm['id'] }}" name="perm[]" {{ in_array($perm['id'], $has_perm) ? 'checked':'' }}> {{ $perm['cname'] }}
    </label>
@endforeach
</div>