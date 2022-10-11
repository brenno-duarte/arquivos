<script>
    save()

    function save() {
        let dataPatients = {
            namePatient: 'Brenno',
            agePatient: '22',
            cpfPatient: '123.123.123-12',
            rgPatient: '123123123-4',
            crmPatient: '1234',
            genderPatient: 'Masculino',
            phonePatient: '(88) 9999-9999',
            cityPatient: 'Iguatu',
            nationPatient: 'Rua',
            streetPatient: 'Cocobó',
            districtPatient: 'Ceará',
            numberPatient: '123',
            complementPatient: 'lorem ipsum'
        }

        //console.log(JSON.stringify(dataPatients));

        fetch('http://localhost:9002/api/patient/insert', {
                cache: 'no-cache',
                body: JSON.stringify(dataPatients),
                method: 'POST'
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(err => console.log('Request Failed - ', err));
    }
</script>