<footer class="footer" style="z-index: 1055; position: fixed; padding: 8px; font-size: 8px; height: 30px;background-color: #292961; border-top: 1px solid #292961;color: #babadc;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Fleet App 2023 | Users : {{ Auth::user()->name }} | {{ Auth::user()->email }} | {{ Auth::user()->roles }} |
                @php
                $branch_user = DB::table('dt_branch')->where('id', Auth::user()->branch_id)->first();
                @endphp
                {{ ($branch_user == null) ? '' : $branch_user->code_branch.'-'.$branch_user->name_branch }}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block"> developed by IT TUA v.0.0.1
                </div>
            </div>
        </div>
    </div>
</footer>