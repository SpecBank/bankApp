const elementsArray = ['przelew', 'pozyczka', 'h_przel', 'h_log']

function changeVisiblity(x){
    elementsArray.forEach(element => {
        document.getElementById(element).classList.add('invisible')
    });
    document.getElementById(x).classList.remove('invisible')
}

document.getElementById('przelew').classList.remove('invisible')

