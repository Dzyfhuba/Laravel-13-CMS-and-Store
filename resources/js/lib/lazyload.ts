export function lazyLoad(node, src) {
  // Use IntersectionObserver to swap placeholder for real image
  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      node.src = src;
      observer.unobserve(node);
    }
  });

  observer.observe(node);

  return {
    destroy() {
      observer.disconnect();
    }
  };
}
