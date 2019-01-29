const updateLinkUrl = productId => {
  const aTag = document.getElementById(`productId-${productId}`);
  let url = aTag.getAttribute("href");
  url = url.substring(0, url.indexOf("&qty=") + 5);
  const newQty = document.getElementById(`qty-${productId}`).value;
  url = url.concat(newQty);
  aTag.setAttribute("href", url);
};
