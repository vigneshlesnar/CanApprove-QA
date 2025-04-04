const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;
const { useBlockProps } = wp.blockEditor;

registerBlockType("tsp/tripple-switch", {
    title: "Triple Switch",
    icon: "admin-generic",
    category: "widgets",
    attributes: {
        yesLabel: { type: "string", default: "Yes" },
        inheritLabel: { type: "string", default: "Inherit" },
        noLabel: { type: "string", default: "No" },
        yesContent: { type: "string", default: "Yes option is selected." },
        inheritContent: { type: "string", default: "Inherit option is selected." },
        noContent: { type: "string", default: "No option is selected." }
    },
    edit: (props) => {
        const { attributes, setAttributes } = props;
        const blockProps = useBlockProps();

        return (
            <div {...blockProps}>
                <TextControl
                    label="Yes Label"
                    value={attributes.yesLabel}
                    onChange={(value) => setAttributes({ yesLabel: value })}
                />
                <TextControl
                    label="Inherit Label"
                    value={attributes.inheritLabel}
                    onChange={(value) => setAttributes({ inheritLabel: value })}
                />
                <TextControl
                    label="No Label"
                    value={attributes.noLabel}
                    onChange={(value) => setAttributes({ noLabel: value })}
                />
                <TextControl
                    label="Yes Content"
                    value={attributes.yesContent}
                    onChange={(value) => setAttributes({ yesContent: value })}
                />
                <TextControl
                    label="Inherit Content"
                    value={attributes.inheritContent}
                    onChange={(value) => setAttributes({ inheritContent: value })}
                />
                <TextControl
                    label="No Content"
                    value={attributes.noContent}
                    onChange={(value) => setAttributes({ noContent: value })}
                />
            </div>
        );
    },
    save: () => {
        return null; // Render dynamically via PHP
    }
});
