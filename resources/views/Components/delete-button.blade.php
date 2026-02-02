@props(['route', 'confirmMessage' => 'Are you sure you want to delete this?', 'label' => 'Delete'])

<form action="{{ $route }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn" onclick="return confirm('{{ $confirmMessage }}')">
        {{ $label }}
    </button>
</form>