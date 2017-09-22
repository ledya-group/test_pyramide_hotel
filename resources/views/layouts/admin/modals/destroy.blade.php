@if(isset($data))
    @foreach($data as $d)
        <div class="modal fade show" id="{{ $d['modal_id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $d['modal_title'] }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $d['modal_description'] }}</p>
                    </div>
                    <div class="modal-footer">
                        <form id="{{ $d['modal_form_id'] }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="modal fade show" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $modal_title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $modal_description }}</p>
                </div>
                <div class="modal-footer">
                    <form id="{{ $modal_form_id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
@endif


@section('script')
    <script>
        @if(isset($data))
            @foreach($data as $d)
                $(document).ready(() => {
                    $("#{{ $d['modal_id'] }}").on('show.bs.modal', event => {
                        let button = $(event.relatedTarget)
                        let target_id = button.data('{{ $d['dataTarget_id'] }}')
                        
                        $("#{{ $d['modal_form_id'] }}").attr('action', "{{ route($d['route_prefix']) }}/" + target_id)
                    })
                })
            @endforeach
        @else
            $(document).ready(() => {
                $("#{{ $modal_id }}").on('show.bs.modal', event => {
                    let button = $(event.relatedTarget)
                    let target_id = button.data('{{ $dataTarget_id }}')
                    
                    $("#{{ $modal_form_id }}").attr('action', "{{ route($route_prefix) }}/" + target_id)
                })
            })
        @endif
    </script>
@endsection