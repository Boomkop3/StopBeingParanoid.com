getMethods = (obj) => Object.getOwnPropertyNames(obj).filter(item => typeof obj[item] === 'function');
boolStr = (bool) => (bool?"Yes":"No");