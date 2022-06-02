// EXAMPLE_CODE This is example, you may remove

wp.domReady(() => {

    wp.blocks.registerBlockStyle("core/button", [
        {
            name: "tertiary-with-icon",
            label: "Tertiary with icon",
        },
              {
            name: "primary-orange",
            label: "Primary Orange",
        }
    ]);

      wp.blocks.registerBlockStyle("core/image", [
        {
            name: "shadow-with-smooth-edge",
            label: "Shadow with smooth edge",
        }
    ]);


});
