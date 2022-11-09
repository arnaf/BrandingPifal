<script>
    let drug_id;
    let drug_detail_id;

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
                // console.log(response)
                $("#drugNameEdit").val(response.name);

                $("#drugCategoryEdit").val(response.drug_category_id);

                $("#drugTypeEdit").val(response.drug_type_id);


                Swal.close();
                $('#editModal').modal('show');
            }
        });
    }



    const detailDrug =  (id) => {

        var formData = new FormData($("#detailDrugForm")[0]);

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
            url: `/drugdetails/${drug_id}`,
            contentType: false,
            dataType: "json",
            success: function (response) {

                $("#drugUnit").val(response.unit_id);
                $("#buyPrice").val(response.buyPrice);
                $("#sellPrice").val(response.sellPrice);
                $("#drugBPJSStatus").val(response.bpjsStatus);
                $("#drugPatentStatus").val(response.patentStatus);
                $("#drugDesc").val(response.desc);
                $("#drugUsage").val(response.usage);
                $("#drugDosage").val(response.dosage);
                $("#unitDesc").val(response.unitDesc);
                $("#sideEffect").val(response.sideEffect);
                $("#bpomNum").val(response.bpomNum);

                Swal.close();
                $('#detailDrugModal').modal('show');
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
                    { data: 'drugtype', name:'drugs.drug_type_id'},
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



        $('#detailDrugSubmit').click(function (e) {
            e.preventDefault();

            var formData = new FormData($("#detailDrugForm")[0]);


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
                url: `/drugdetails/${drug_id}`,
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


                        $('#detailDrugModal').modal('hide');
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
