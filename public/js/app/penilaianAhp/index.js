var body = $('body');
var baseurl = $('.baseurl').data('value');
var initialData = [];
var proses_ahp = [];

var loadData = () => {
    $.ajax({
        url: `${baseurl}/PenilaianAhp/initialData`,
        type: 'get',
        dataType: 'json',
        success: function(data){
            initialData = data;
        }
    })
}

$(document).ready(function(){
    loadData();
   body.on('change', 'select[name="select_matrix"]', function(e){
    let row = $(this).data('row');
    let column = $(this).data('column');
    let value = $(this).val();
    let valueInvers = '';
    const { matriks } = initialData.data_statis;

    const checkSearch = String(value).search('/');
    if(checkSearch == 1){
        valueInvers = String(value).substring(2,3);
    } else {
        valueInvers = `1/${value}`;
    }

    if(value == ''){
        valueInvers = 0;
    }

    $(this).data('value', value);
    $(`.invers_matrix[data-row="${column}"][data-column="${row}"]`).text(valueInvers);
    $(`.invers_matrix[data-row="${column}"][data-column="${row}"]`).data('value', valueInvers);
   })

   body.on('click','.btn-hitung',function(e){
    e.preventDefault();
    var data_matriks = $('.data_matriks');

        // validate data
        let error = false;
        $.each(data_matriks, function(value, index){
            var value = $(this).data('value');
            if(value == ''){
                error = true;
            }
        })
        if(error){
            return Swal.fire({
                title: 'Failed',
                text: 'Pastikan semua nilai diisi',
                icon: "error",
                confirmButtonText: "OK",
            });
        }

        let perbandingan = {};
        $.each(data_matriks, function(index, value) {
            var kriteria_id1 = $(this).data('kriteria_id1');
            var kriteria_id2 = $(this).data('kriteria_id2');
            var nilai = $(this).data('value');

            if (!(kriteria_id1 in perbandingan)) {
                perbandingan[kriteria_id1] = [];
            }

            if (String(nilai).indexOf('/') !== -1) {
                const pecahan = nilai.split('/');
                nilai = parseFloat(pecahan[0]) / parseFloat(pecahan[1]);
            }

            perbandingan[kriteria_id1].push({
                [kriteria_id2]: parseFloat(nilai),
            })
        });

        function mergeObjects(data) {
            const result = {};
            Object.keys(data).forEach(key => {
                result[key] = {};
            
                data[key].forEach(obj => {
                    Object.entries(obj).forEach(([innerKey, value]) => {
                        result[key][innerKey] = value;
                        });
                    });
            });
        
            return result;
        }
        
        // Gabungkan data
        const mergedData = mergeObjects(perbandingan);
        $.ajax({
            url: `${baseurl}/PenilaianAhp/prosesAhp`,
            type: 'post',
            data:{
                matrix: mergedData,
                is_kriteria: true,
            },
            success: function(data){
                console.log('get data', data);
            }
        })
   })
})
