// Drop down category
function dropDownCategory() {
  let productCateContainer = document.querySelector(".section-category-container");
  if (productCateContainer.classList.contains("drop-product-cate")) {
    document.querySelector(".drop-cate-ic").style.transform = "rotate(180deg)";
    productCateContainer.classList.remove("drop-product-cate");
    productCateContainer.classList.add("scroll-product-cate");
  } else {
    document.querySelector(".drop-cate-ic").style.transform = "rotate(360deg)";
    productCateContainer.classList.remove("scroll-product-cate");
    productCateContainer.classList.add("drop-product-cate");
  }
}