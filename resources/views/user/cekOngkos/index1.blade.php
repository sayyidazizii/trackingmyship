@extends('user.template.appuser')

@section('title', 'Check Ongkos')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <link rel="stylesheet" href="{{asset('user/style.css')}}"> --}}
<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="text-center mt-3">cek ongkos kirim paket</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-4 mb-3">
                <input class="form-control" type="text" id="input-box" placeholder="Masukkan kota 1" autocomplete="off"/>
                <div class="result-box"></div>
            </div>
            <div class="col-md-4 mb-3">
                <input class="form-control" type="text" id="input-box-2" placeholder="Masukkan kota 2" autocomplete="off"/>
                <div class="result-box-2"></div>
            </div>
            <div class="col-md-4 mb-3">
                <input class="form-control" type="text" id="berat" placeholder="Masukkan berat paket" autocomplete="off"/>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <button class="btn btn-warning btn-block" onclick="handleButtonClick()">Cari</button>
            </div>
        </div>

        <div class="cotainer">
            <div class="row align-items-center">
                <div class="col-md-12 mx-auto bg-light d-none">
                    <h3 id="routeSummary" class="text-center mt-3"></h3>
                </div>
                <div id="tabel12" class="d-none">
                    <div class="col-md-12 mx-auto mt-3">
                        <table class="table table-responsive">
                            <tr>
                                <td>Dari</td>
                                <td>:</td>
                                <td id='asal'></td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td>:</td>
                                <td id='tujuan'></td>
                            </tr>
                            <tr>
                                <td>berat Paket</td>
                                <td>:</td>
                                <td id="berat1"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12 mx-auto md-3">
                        <table align="center" class="table">
                            <thead>
                                <tr>
                                    <th>jenis layanan</th>
                                    <th>biaya layanan</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Reguler</td>
                                    <td>Rp. 5.000</td>
                                    <td id="reguler"></td>
                                </tr>
                                <tr>
                                    <td>Express</td>
                                    <td>Rp. 10.000</td>
                                    <td id="express"></td>
                                </tr>
                                <tr>
                                    <td>Same Day</td>
                                    <td>Rp. 20.000</td>
                                    <td id="sumday"></td>
                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td>Rp. 15.000</td>
                                    <td id="cargo"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    var db = [];

    $(document).ready(function () {
        $.getJSON("{{asset('user/alamat.json')}}", function (data) {
            $.each(data, function (key, value) {
                db.push(value);
            });
        });

        const input = $("#input-box");
        const input2 = $("#input-box-2");
        const resultBox = $(".result-box");
        const resultBox2 = $(".result-box-2");
        input.on("input", function () {
            let data = [];
            let masuk = input.val();
            if (masuk.length) {
                data = db.filter((item) => {
                    return item.kota.toLowerCase().includes(masuk.toLowerCase());
                });
            }
            display(data);
        });

        input2.on("input", function () {
            let data1 = [];
            let masuk1 = input2.val();
            if (masuk1.length) {
                data1 = db.filter((item) => {
                    return item.kota.toLowerCase().includes(masuk1.toLowerCase());
                });
            }
            display1(data1);
        });

        function display(data) {
            const content = data.map((item) => {
                return "<li class='list-group-item list-group-item-action' onclick='selectionInput(this)'>" + item.kota + "</li>";
            });

            // Clear previous content
            resultBox.empty();

            // Append new content
            currentUl = $("<ul class='list-group'>" + content.join("") + "</ul>");
            resultBox.append(currentUl);
        }

        function display1(data1) {
            const content1 = data1.map((item1) => {
                return (
                    "<li class='list-group-item' onclick='selectionInput1(this)'>" + item1.kota + "</li>"
                );
            });

            // Clear previous content
            resultBox2.empty();

            // Append new content
            currentU2 = $("<ul class='list-group'>" + content1.join("") + "</ul>");
            resultBox2.append(currentU2);
        }
    });

    function selectionInput(list) {
        $("#input-box").val(list.innerHTML);
        $(".result-box").empty();
    }

    function selectionInput1(list1) {
        $("#input-box-2").val(list1.innerHTML);
        $(".result-box-2").empty();
    }

    async function handleButtonClick() {
        const alamat1 = document.getElementById("input-box").value;
        const alamat2 = document.getElementById("input-box-2").value;

        try {
            // Tampilkan SweetAlert untuk memberi tahu pengguna bahwa sedang memproses
            Swal.fire({
                title: 'Loading...',
                text: 'Sedang memproses data',
                showConfirmButton: false,
                showCancelButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            // Hentikan SweetAlert setelah mendapatkan data
            await geocodeAddress(alamat1, alamat2);

            // Tampilkan SweetAlert dengan pesan berhasil

        } catch (error) {
            // Tampilkan SweetAlert dengan pesan kesalahan
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Gagal memproses data. Mohon coba lagi.',
                showConfirmButton: true,
            });

            console.error("Terjadi kesalahan:", error);
        } finally {
            // Tutup SweetAlert
            Swal.close();
        }
    }

    async function geocodeAddress(alamat1, alamat2) {

        const baseUrl =
            "https://nominatim.openstreetmap.org/search?format=json&limit=1&q=";

        // Geocode Alamat 1
        const url1 = baseUrl + encodeURIComponent(alamat1);
        const data1 = await geocode(url1);
        console.log("Alamat 1:", alamat1, "Data:", data1);

        // Geocode Alamat 2
        const url2 = baseUrl + encodeURIComponent(alamat2);
        const data2 = await geocode(url2);
        console.log("Alamat 2:", alamat2, "Data:", data2);

        // Combine coordinates
        const combinedData = [data1, data2];
        console.log("Combined Data:", combinedData);

        // Send coordinates to OpenRouteService API
        await sendCoordinatesToOpenRouteService(combinedData);
    }

    async function geocode(url) {
        try {
            const response = await fetch(url);
            const data = await response.json();

            if (data.length > 0) {
                const latitude = parseFloat(data[0].lat);
                const longitude = parseFloat(data[0].lon);

                return [longitude, latitude];
            } else {
                // Tampilkan SweetAlert jika alamat tidak ditemukan
                Swal.fire({
                    icon: 'warning',
                    title: 'Alamat Tidak Ditemukan',
                    text: 'Mohon periksa kembali alamat yang dimasukkan.',
                });

                console.error("Geocoding gagal. Alamat tidak ditemukan.");
                return null;
            }
        } catch (error) {
            // Tampilkan SweetAlert jika terjadi kesalahan
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Gagal memproses data. Mohon coba lagi.',
            });

            console.error("Terjadi kesalahan:", error);
            return null;
        }
    }

    async function sendCoordinatesToOpenRouteService(coordinates) {
        const url =
            "https://api.openrouteservice.org/v2/directions/driving-car";
        const headers = {
            Accept:
                "application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8",
            "Content-Type": "application/json",
            Authorization:
                "5b3ce3597851110001cf62484c7cbdc2face44e58659661e4d6be4d7",
        };

        const body = {
            coordinates: coordinates,
        };

        try {
            const response = await fetch(url, {
                method: "POST",
                headers: headers,
                body: JSON.stringify(body),
            });

            console.log("Status:", response.status);
            console.log("Headers:", response.headers);

            const data = await response.json();

            let json = JSON.stringify(data, null, 2);
            const timestamp = new Date().getTime();
            const filename = `file_${timestamp}.json`;

            // Save the data to local storage with a unique filename
            localStorage.setItem(filename, json);

            const storedData = localStorage.getItem(filename);
            if (storedData) {
                // Parse data JSON
                const parsedData = JSON.parse(storedData);

                // Ambil data summary
                const routeSummary = parsedData.routes[0].summary;

                // Tampilkan data summary di halaman web
                const summaryElement = document.getElementById("routeSummary");

                if (summaryElement) {
                    const distanceInKilometers = routeSummary.distance / 1000;
                    const durationInSeconds = routeSummary.duration;

                    const { roundedDistance, roundedCost } =
                        calculateCost(distanceInKilometers);
                    summaryElement.innerHTML = `jarak dari kota 1 ke kota 2 adalah : ${roundedDistance} kilometer `;
                } else {
                    console.error("Element with id 'routeSummary' not found.");
                }
            } else {
                console.error("No data found in local storage.");
            }

            // Display the route on the map
            //   displayRouteOnMap(data.features[0].geometry.coordinates);
        } catch (error) {
            console.error("Error:", error);
        }
        // displayRouteSummary(filename);
    }

    function calculateCost(distanceInKilometers) {
        let berat = $('#berat').val();
        const awal = document.getElementById("input-box").value;
        const tujuan = document.getElementById("input-box-2").value;
        const tariffPerKilometer = 100;
        const totalCost = distanceInKilometers * tariffPerKilometer;
        $('#berat1').html(berat + 'Kg');
        $('#asal').html(awal);
        $('#tujuan').html(tujuan);
        const roundedDistance = Math.round(distanceInKilometers);
        const roundedCost = Math.round(totalCost);
        const formatter = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        let leguler = 5000 * berat;
        let sumday = 20000 * berat;
        let express = 10000 * berat;
        let cargo = 15000 * berat;
        let layana1 = formatter.format(roundedCost + express);
        let layanan2 = formatter.format(roundedCost + sumday);
        let layanan3 = formatter.format(roundedCost + leguler);
        let layana4 = formatter.format(roundedCost + cargo);
        $("#express").html(layana1);
        $("#sumday").html(layanan2);
        $('#reguler').html(layanan3);
        $('#cargo').html(layana4);
        // console.log(berat);
        $('#tabel12').removeClass('d-none');

        return { roundedDistance, roundedCost };
    }
</script>
@endsection
