<script>
    let supplier_id;

    const create = () => {
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk data supplier ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            Swal.close();

            if(result.value) {
                Swal.fire({
                    title: 'Mohon tunggu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/supplier/${id}`,
                    dataType: "json",
                    success: function (response) {
                        Swal.close();

                        if(response.status) {
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )

                            $('#table').DataTable().ajax.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                response.msg,
                                'warning'
                            )
                        }
                    }
                });
            }
        });
    }

    const edit = (id) => {
        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });

        supplier_id = id;

        $.ajax({
            type: "get",
            url: `/supplier/${supplier_id}`,
            dataType: "json",
            success: function (response) {
                $("#nameEdit").val(response.name);
                $("#addressEdit").val(response.address);
                $("#phoneEdit").val(response.phone);
                $("#statusEdit").val(response.status);

                Swal.close();
                $('#editModal').modal('show');
            }
        });
    }

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


            $('#table').DataTable({
                order: [],
                lengthMenu: [[5, 10, 25, 50, -1], ['5', '10', '25', '50', 'All']],
                filter: true,
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: '/supplier/data'
                },
                "columns":
                [
                    { data: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'name', name:'suppliers.name'},
                    { data: 'address', name:'suppliers.address'},
                    { data: 'phone', name:'suppliers.phone'},
                    { data: 'status', name:'suppliers.status'},

                    { data: 'action', orderable: false, searchable: false},
                ]
            });




        $('#createSubmit').click(function (e) {
            e.preventDefault();

            var formData = $('#createForm').serialize();

            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: "post",
                url: "/supplier",
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                success: function(data) {

                    Swal.close();
                    if(data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        $('#createModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            })
        });

        $('#editSubmit').click(function (e) {
            e.preventDefault();

            var formData = $('#editForm').serialize();

            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: "post",
                url: `/supplier/${supplier_id}`,
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.close();

                    if(data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        pengguna_id = null;
                        $('#editModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            })
        });
    });
</script>
