$(document).ready(function(){
    let action, jml, posisi, x, y, filled;
    let arrayAksi = {}, belumErupsi = [], erupsiSebagian = [], karies = [], nonVital = [], tambalanLogam = [], tambalanNonLogam = [], mahkotaLogam = [], mahkotaNonLogam = [], sisaAkar = [], gigiHilang = [], jembatan = [], gigiTiruanLepas = [];
    $('.btn-group-aksi').click(function(){
        action = $(this).attr('id');
        $('.btn-aksi').removeClass('btn-success').addClass('btn-light');
        $(this).removeClass('btn-light').addClass('btn-success');
    });

    $(document).on("click", "polygon,text,line", function (evt) {
        let color,type,element;
        var odontogram = $(evt.target);
        var odontogramParent = odontogram.parent().attr('id');
        var odontogramId = odontogramParent + '-' +odontogram.attr('id');

        let foundParent = Object.keys(arrayAksi).filter(function(key) {
            return arrayAksi[key].includes(odontogramParent);
        });

        let foundParentId = Object.keys(arrayAksi).filter(function(key) {
            return arrayAksi[key].includes(odontogramId);
        });

        switch (action) {
            case 'belum-erupsi':
                if (foundParent < 1) {
                    type = 'insert-text';
                    x = 1.5; y = 15;
                    color = '#5D5FEF';
                    style = 'font-size: 10pt;font-weight:bold;cursor:default';
                    element = 'UE';
                    belumErupsi.push(odontogramParent);
                    arrayAksi['belum-erupsi'] = belumErupsi;
                    jml = belumErupsi.length;
                    posisi = belumErupsi;
                    filled = true;
                }
                break;
            case 'erupsi-sebagian':
                if (foundParent < 1) {
                    type = 'insert-text';
                    x = 1.5; y = 15;
                    color = '#5D5FEF';
                    style = 'font-size: 10pt;font-weight:bold;cursor:default';
                    element = 'PE'
                    erupsiSebagian.push(odontogramParent);
                    arrayAksi['erupsi-sebagian'] = erupsiSebagian;
                    jml = erupsiSebagian.length;
                    posisi = erupsiSebagian;
                    filled = true;
                }
                break;
            case 'karies':
                if (foundParentId < 1) {
                    color = 'grey';
                    karies.push(odontogramId);
                    arrayAksi['karies'] = karies;
                    jml = karies.length;
                    posisi = karies;
                    filled = true;
                }
                break;
            case 'non-vital':
                if (foundParent < 1) {
                    type = 'insert-non-vital';
                    nonVital.push(odontogramParent);
                    arrayAksi['non-vital'] = nonVital;
                    jml = nonVital.length;
                    posisi = nonVital;
                    style = 'stroke-width:2';
                    color = '#C71616';
                    filled = true;
                }
                break;
            case 'tambalan-logam':
                if (foundParentId < 1) {
                    color = 'pink';
                    tambalanLogam.push(odontogramId);
                    arrayAksi['tambalan-logam'] = tambalanLogam;
                    jml = tambalanLogam.length;
                    posisi = tambalanLogam;
                    filled = true;
                }
                break;
            case 'tambalan-non-logam':
                if (foundParentId < 1) {
                    color = 'blue';
                    tambalanNonLogam.push(odontogramId);
                    arrayAksi['tambalan-non-logam'] = tambalanNonLogam;
                    jml = tambalanNonLogam.length;
                    posisi = tambalanNonLogam;
                    filled = true;
                }
                break;
            case 'mahkota-logam':
                if (foundParentId < 1) {
                    color = 'green';
                    mahkotaLogam.push(odontogramId);
                    arrayAksi['mahkota-logam'] = mahkotaLogam;
                    jml = mahkotaLogam.length;
                    posisi = mahkotaLogam;
                    filled = true;
                }
                break;
            case 'mahkota-non-logam':
                if (foundParentId < 1) {
                    color = '#66D1D1';
                    mahkotaNonLogam.push(odontogramId);
                    arrayAksi['mahkota-non-logam'] = mahkotaNonLogam;
                    jml = mahkotaNonLogam.length;
                    posisi = mahkotaNonLogam;
                    filled = true;
                }
                break;
            case 'sisa-akar':
                if (foundParent < 1) {
                    type = 'insert-text';
                    x = 3.5; y = 17;
                    color = '#5D5FEF';
                    style = 'font-size: 15pt;font-weight:bold;cursor:default';
                    element = 'V'
                    sisaAkar.push(odontogramParent);
                    arrayAksi['sisa-akar'] = sisaAkar;
                    jml = sisaAkar.length;
                    posisi = sisaAkar;
                    filled = true;
                }
                break;
            case 'gigi-hilang':
                if (foundParent < 1) {
                    type = 'insert-text';
                    x = 3.5; y = 17;
                    color = '#C71616';
                    style = 'font-size: 15pt;font-weight:bold;cursor:default';
                    element = 'X'
                    gigiHilang.push(odontogramParent);
                    arrayAksi['gigi-hilang'] = gigiHilang;
                    jml = gigiHilang.length;
                    posisi = gigiHilang;
                    filled = true;
                }
                break;
            case 'jembatan':
                if (foundParent < 1) {
                    type = 'insert-line';
                    color = '#048A3F';
                    style = 'stroke-width:2';
                    jembatan.push(odontogramParent);
                    arrayAksi['jembatan'] = jembatan;
                    jml = jembatan.length;
                    posisi = jembatan;
                    filled = true;
                }
                break;
            case 'gigi-tiruan-lepas':
                if (foundParent < 1) {
                    type = 'insert-line';
                    color = '#E4AA04';
                    style = 'stroke-width:2';
                    gigiTiruanLepas.push(odontogramParent);
                    arrayAksi['gigi-tiruan-lepas'] = gigiTiruanLepas;
                    jml = gigiTiruanLepas.length;
                    posisi = gigiTiruanLepas;
                    filled = true;
                }
                break;
            case 'hapus-aksi':
                filled = true;
                Object.keys(arrayAksi).filter(function(key) {
                    arrayAksi[key] = arrayAksi[key].filter(e => e !== odontogramParent);
                    arrayAksi[key] = arrayAksi[key].filter(e => e !== odontogramId);
                });
                switch ($(this).attr('type')) {
                    case 'insert-text':
                        d3.select("text#"+odontogramParent).remove();
                        break;
                    case 'insert-line':
                        d3.select("line#"+odontogramParent).remove();
                        break;
                    case 'insert-non-vital':
                        d3.select("line#"+odontogramId).remove();
                        d3.select("line#"+odontogramId).remove();
                        d3.select("line#"+odontogramId).remove();
                        break;
                    case 'insert-fill':
                        odontogram.attr('fill', 'white');
                        break;
                }
                break;
        }

        console.log(arrayAksi);

        if (type == 'insert-text') {
            d3.select('g#'+odontogramParent).append('text').attr('id',odontogramParent).attr('type','insert-text').attr('x', x).attr('y', y).attr('stroke', color).attr('fill', color).attr('stroke-width', '0.1').attr('style', style).text(element);
        } else if (type == 'insert-line') {
            d3.select('g#'+odontogramParent).append('line').attr('id',odontogramParent).attr('type','insert-line').attr('x1', '20').attr('y1', '10').attr('x2', '0').attr('y2', '10').attr('stroke',color).attr('style', style);
        } else if (type == 'insert-non-vital') {
            d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('type','insert-non-vital').attr('x1', '5').attr('y1', '15').attr('x2', '0').attr('y2', '15').attr('stroke',color).attr('style', style);
            d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('type','insert-non-vital').attr('x1', '15').attr('y1', '5').attr('x2', '5').attr('y2', '15').attr('stroke',color).attr('style', style);
            d3.select('g#'+odontogramParent).append('line').attr('id',odontogramId).attr('type','insert-non-vital').attr('x1', '20').attr('y1', '5').attr('x2', '15').attr('y2', '5').attr('stroke',color).attr('style', style);
        } else {
            odontogram.attr('fill', color).attr('type','insert-fill');
        }

        if (filled) {
            $.each(arrayAksi, function(index, value) {
                $("#keterangan form").find("input[name='"+index+"']").val(arrayAksi[index].length);
                $("#keterangan form").find("input[name='"+index+"']").parent().find('span').text(value.toString().toUpperCase());
            });
            filled = false;
        }
    });
});
