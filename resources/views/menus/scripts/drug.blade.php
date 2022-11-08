<script>
    let drug_id;

    const create = () => {
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus data obat ini?',
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
                    url: `/drug/${id}`,
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

        var formData = new FormData($("#editForm")[0]);


        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });

        drug_id = id;

        $.ajax({
            type: "get",
            url: `/drug/${drug_id}`,
            contentType: false,
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#drugNameEdit").val(response.name);
                $("#drugBrandEdit").val(response.brand);
                $("#drugCategoryEdit").val(response.drug_category_id);
                $("#drugPatentStatusEdit").val(response.patentStatus);
                $("#drugTypeEdit").val(response.drug_type_id);
                $("#drugUnitEdit").val(response.unit_id);
                $("#drugPriceEdit").val(response.price);
                // $("#drugPhotoEdit").val(response.photo);
                $("#drugBPJSStatusEdit").val(response.bpjsStatus);

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
                    url: '/drug/data'
                },
                "columns":
                [
                    { data: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'name', name:'drugs.name'},
                    { data: 'drugcategory', name:'drugs.drug_category_id'},
                    { data: 'brand', name:'drugs.brand'},
                    { data: 'drugtype', name:'drugs.drug_type_id'},
                    { data: 'patentStatus', name:'drugs.patentStatus'},
                    { data: 'drugunit', name:'drugs.unit_id'},
                    { data: 'bpjsStatus', name:'drugs.bpjsStatus'},
                    { data: 'action', orderable: false, searchable: false},
                ]
            });




        $('.drugPrice').keyup(function(event) {
        if(event.which >= 37 && event.which <= 40) return;

        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        });


        $('#createSubmit').click(function (e) {
            e.preventDefault();

            var formData = new FormData($("#createForm")[0]);

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
                url: "/drug",
                data: formData,
                dataType: "json",
                cache: false,
                contentType: false,
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

            var formData = new FormData($("#editForm")[0]);


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
                url: `/drug/${drug_id}`,
                data: formData,
                dataType: "json",
                cache: false,
                contentType: false,
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
