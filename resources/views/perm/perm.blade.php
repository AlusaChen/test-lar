<div>
@foreach($perms as $perm)
    @if(!$perm['pid'])
        </div><div>
    @endif
    <label class="checkbox-inline perm-item">
        <input data-parent="{{ $perm['pid'] }}" type="checkbox" id="inlineCheckbox{{ $perm['id'] }}" value="{{ $perm['id'] }}" name="perm[]" {{ in_array($perm['id'], $has_perm) ? 'checked':'' }}> {{ $perm['cname'] }}
    </label>
@endforeach
</div>
<script type="text/javascript">
function select_perm()
{
    var iperm = document.getElementsByClassName('perm-item');
    console.log(iperm);
}
//select_perm();
</script>