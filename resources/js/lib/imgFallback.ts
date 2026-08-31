export function handleImgFallback(node, fallback) {
  function updateSrc() {
    node.src = fallback;
  }

  // If the image already failed before JS loaded
  if (node.complete && node.naturalWidth === 0) {
    updateSrc();
  }

  node.addEventListener('error', updateSrc);

  return {
    destroy() {
      node.removeEventListener('error', updateSrc);
    }
  };
}