<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Tooth Anatomy</title>
    <script src="https://threejs.org/build/three.js"></script>
</head>
<body>
    <!-- Your 3D Tooth Anatomy script goes here -->
    <!-- Embedded Sketchfab 3D model -->
    <iframe src="https://3dwarehouse.sketchup.com/embed/94f9bdbb34caf4107d5cf62252176e4f?token=HjNEdkvz9Ng=&binaryName=s21" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="580" height="326" allowfullscreen></iframe>

    {{-- <script>
        // Livewire Component Initialization
        document.addEventListener("livewire:load", function () {
                Livewire.emit('livewire:load');
            });

            // Set up scene, camera, and renderer
            var scene = new THREE.Scene();
            var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            var renderer = new THREE.WebGLRenderer();
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.body.appendChild(renderer.domElement);

            // Create a tooth geometry and material
            var geometry = new THREE.BoxGeometry(1, 2, 0.5);
            var material = new THREE.MeshBasicMaterial({ color: 0xffffff, wireframe: true });
            var tooth = new THREE.Mesh(geometry, material);

            // Add the tooth to the scene
            scene.add(tooth);

            // Position the camera
            camera.position.z = 5;

            // Set up animation loop
            var animate = function () {
                requestAnimationFrame(animate);

                // Rotate the tooth
                tooth.rotation.x += 0.01;
                tooth.rotation.y += 0.01;

                renderer.render(scene, camera);
            };

            // Start the animation loop
            animate();

            // Window resize event listener
            window.addEventListener('resize', function () {
                var newWidth = window.innerWidth;
                var newHeight = window.innerHeight;

                camera.aspect = newWidth / newHeight;
                camera.updateProjectionMatrix();

                renderer.setSize(newWidth, newHeight);
            });

            // Livewire event listener for reinitializing the component
            Livewire.on('livewire:load', function () {
                scene = new THREE.Scene();
                camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                renderer = new THREE.WebGLRenderer();
                renderer.setSize(window.innerWidth, window.innerHeight);
                document.body.appendChild(renderer.domElement);

                geometry = new THREE.BoxGeometry(1, 2, 0.5);
                material = new THREE.MeshBasicMaterial({ color: 0xffffff, wireframe: true });
                tooth = new THREE.Mesh(geometry, material);

                scene.add(tooth);

                camera.position.z = 5;

                animate();
            });
    </script> --}}
</body>
</html>
