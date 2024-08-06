function main_execution() {
  const inputs = document.forms["myweb"].elements;
  const constraints = {
    "min_quantity": {
      min: 0,
      max: Number.MAX_SAFE_INTEGER,
      errorMsgLessThanZero: "Minimum Quantity can't be less than zero(0).",
      errorMsgTooBig: "Minimum Quantity entered is too big. ",
    },
    "max_quantity": {
      min: 0,
      max: Number.MAX_SAFE_INTEGER,
      errorMsgLessThanZero: "Maximum Quantity can't be less than zero(0). ",
      errorMsgTooBig: "Maximum Quantity entered is too big. ",
    },
    "min_price": {
      min: 0,
      max: Number.MAX_SAFE_INTEGER,
      errorMsgLessThanZero: "Minimum Price can't be less than zero(0).",
      errorMsgTooBig: "Minimum Price entered is too big. ",
    },
    "max_price": {
      min: 0,
      max: Number.MAX_SAFE_INTEGER,
      errorMsgLessThanZero: "Maximum Price can't be less than zero(0). ",
      errorMsgTooBig: "Maximum Price entered is too big. ",
    },
  };

  for (let i of inputs) {
    if (constraints[i.name]) {
      const {min, max, errorMsgLessThanZero, errorMsgTooBig} = constraints[i.name];
      const value = parseInt(i.value);
      if (isNaN(value)) {
        continue;
      }
      if (value < min) {
        alert(errorMsgLessThaZero);
        return false;
      } else if (max < value) {
        alert(errorMsgTooBig);
        return false;
      }
    }
  }

  const minimum_qua = parseInt(inputs["min_quantity"].value);
  const maximum_qua = parseInt(inputs["max_quantity"].value);
  const minimum_price = parseInt(inputs["min_price"].value);
  const maximum_price = parseInt(inputs["max_price"].value);

  if (maximum_qua < minimum_qua) {
    alert("Minimum Quantity can't be greater than Maximum Quantity.");
    return false;
  }

  if (maximum_price < minimum_price) {
    alert("Minimum Price can't be greater than Maximum Price.");
    return false;
  }

  return true;
}
