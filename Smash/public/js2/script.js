const forms = document.querySelectorAll('#form-js');

forms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault(); //stopper l'évènement

        const url = this.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const postId = this.querySelector('#post-id-js').value;
        const count = this.querySelector('#count-js');


        fetch (url, {
            headers: {
                'Content-Type': 'application/json',
                'x-csrf-token': token
            },
            method: 'post',
            body: JSON.stringify({
                id: postId
            })
        }).then(response => {
            response.json().then(data =>{
                count.innerHTML = data.count;
            })
        }).catch(error =>{
            console.log(error)
        });

    });
});