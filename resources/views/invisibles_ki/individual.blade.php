@extends('layouts.app')


   
    @section('titulo', 'Gestion Invisibles_Ki')
        <!-- Links Data Table -->
            <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.min.css" rel="stylesheet">
        <!-- fin -->
            
        <!-- link Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- fin -->

        <!-- link Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- fin -->

                @section('estilos')
    

                @endsection


                 @section('encabezado')

                        <h3 class="editor-toolbar-item"> Inclusion/Exclusion Invisibles_Ki</h3>
   
   
    @endsection
        @section('contenido')

        @include('layouts.partials.messages')

            <table id="imsis-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ticket</th>
                        <th>IMSI</th>
                        <th>Observasiones</th>
                        <th>Fecha</th>
                    </tr>
                    
                </thead>



            
            </table>
            




             <!-- JQuery -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
             <!-- fin -->

             <!-- Script Chart -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
             <!-- fin -->

             <!-- Script Data Table -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
             <!-- fin -->

             <!-- ScriptBootstrap -->
                <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
             <!-- fin -->

        
        
        @endsection    