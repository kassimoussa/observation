<div>
    <form method="post" action="{{ url('export_fiche', $i) }}">
        @csrf
        <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-file-excel"></i> Exporter</button>
    </form>
</div>