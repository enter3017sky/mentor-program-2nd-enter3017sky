function isPrime(n) {
    if(n === 1)return false;
    // if(n === 2)return true;
    for(var i = 2; i < n; i++){
        if(n % i === 0){
            return false
        }
    }
        return true
}


module.exports = isPrime