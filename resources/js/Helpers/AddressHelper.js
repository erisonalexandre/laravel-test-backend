export function transformAddressToString(address, fields) {
    if (!address || !fields) {
        return null
    }
    let string = ''

    fields.forEach((field, index) => {
        if(address[field] && typeof address[field] == 'string') {
            string += string ? `, ${address[field]}`: address[field]
        }
    })
    return string
}
