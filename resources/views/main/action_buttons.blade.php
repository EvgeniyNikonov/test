@if(!isset($permissionKey) or auth()->user()->isAbleTo($permissionKey . '-read'))
	<a href="{{ route( $routeName . '.show', $element->id) }}" class="btn btn-xs btn-warning" ><i class="fas fa-eye" style="font-size: 17px;"></i></a>
@endif
@if(!isset($permissionKey) or auth()->user()->isAbleTo($permissionKey . '-update'))
	<a href="{{ route( $routeName . '.edit', $element->id) }}" class="btn btn-xs btn-primary" ><i class="fas fa-edit" style="font-size: 17px;"></i></a>
@endif
@if(!isset($permissionKey) or auth()->user()->isAbleTo($permissionKey . '-delete'))
	<form action="{{ route( $routeName . '.destroy', $element->id) }}" method="POST" class="d-inline">
		@method('DELETE')
		@csrf
		<button class="btn btn-xs btn-danger"><i class="fas fa-times" style="font-size: 17px;"></i></button>
	</form>
@endif
